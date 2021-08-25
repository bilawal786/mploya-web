<?php

namespace App\Http\Resources;

use App\Bookmark;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;


class AllJobCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $islike = Bookmark::where('job_id', '=', $this->id)->where('jobseeker_id', '=', auth('api')->user()->id)->exists();
        $employer = User::find($this->employer_id);
        $json = file_get_contents("http://www.geoplugin.net/json.gp?ip=156.146.59.20");
        $details = json_decode($json);
//        dd($details);
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'address' => $employer->address,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'job_title' => $this->job_title,
            'company_name' => $employer->company_name,
            'employer_phone' => $employer->phone,
            'employer_image' => $employer->image,
            'employer_address' => $employer->address,
            'min_salary' => $this->min_salary * $details->geoplugin_currencyConverter,
            'max_salary' => $this->max_salary * $details->geoplugin_currencyConverter,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'min_experience' => $this->min_experience,
            'max_experience' => $this->max_experience,
            'isLike' => empty($islike) ? 0 : 1,
            'currencySymbol' => $details->geoplugin_currencySymbol
        ];
    }
}
