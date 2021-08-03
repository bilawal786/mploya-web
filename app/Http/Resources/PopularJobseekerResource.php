<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PopularJobseekerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'video' => $this->video,
            'language' => $this->language,
            'CNIC' => $this->CNIC,
            'phone' => $this->phone,
            'city' => $this->city,
            'country' => $this->country,
            'father_name' => $this->father_name,
            'description' => $this->description,
            'education_name' => $this->education_name,
            'education_description' => $this->education_description,
            'education_complete_date' => $this->education_complete_date,
            'education_is_continue' => $this->education_is_continue,
            'project_title' => $this->project_title,
            'project_occupation' => $this->project_occupation,
            'project_year' => $this->project_year,
            'project_links' => $this->project_links,
            'project_description' => $this->project_description,
            'skill_name' => $this->skill_name,
            'certification_name' => $this->certification_name,
            'certification_year' => $this->certification_year,
            'certification_description' => $this->certification_description,

        ];
    }
}
