<?php

namespace App\Http\Resources;

use App\Bookmark;
use App\Employerbookmark;
use App\Interview;
use Illuminate\Http\Resources\Json\JsonResource;

use function Ramsey\Uuid\v1;

class JobseekerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $islike = Employerbookmark::where('jobseeker_id', '=', $this->id)->where('employer_id', '=', auth('api')->user()->id)->exists();

        $date = Interview::where('jobseeker_id', '=', $this->id)->where('employer_id', '=', auth('api')->user()->id)->pluck('date')->first();
        $time = Interview::where('jobseeker_id', '=', $this->id)->where('employer_id', '=', auth('api')->user()->id)->pluck('time')->first();


        if ($this->skill_name == "") {
            $skills = "";
        } else {
            $skills = array_slice($this->skill_name, 0, 3);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'image' => $this->image,
            'video' => $this->video,
            'language' => $this->language,
            'occupation' => $this->occupation,
            'CNIC' => $this->CNIC,
            'phone' => $this->phone,
            'city' => $this->city,
            'country' => $this->country,
            'father_name' => $this->father_name,
            'description' => $this->description,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'linkedin_link' => $this->linkedin_link,
            'education_name' => $this->education_name,
            'education_description' => $this->education_description,
            'education_complete_date' => $this->education_complete_date,
            'education_is_continue' => $this->education_is_continue,
            'project_title' => $this->project_title,
            'project_occupation' => $this->project_occupation,
            'project_year' => $this->project_year,
            'project_links' => $this->project_links,
            'project_description' => $this->project_description,
            'skill_name' => $skills,
            'certification_name' => $this->certification_name,
            'certification_year' => $this->certification_year,
            'certification_description' => $this->certification_description,
            'isLike' => empty($islike) ? 0 : 1,
            'date' => $date,
            'time' => $time,
        ];
    }
}
