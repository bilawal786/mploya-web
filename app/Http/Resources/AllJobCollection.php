<?php

namespace App\Http\Resources;

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

        $employer = User::find($this->employer_id);

        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'job_title' => $this->job_title,
            'company_name' => $employer->company_name,
            'employer_phone' => $employer->phone,
            'employer_image' => $employer->image,
            'employer_address' => $employer->address,
            'salary' => $this->salary,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'experience' => $this->experience,
        ];
    }
}
