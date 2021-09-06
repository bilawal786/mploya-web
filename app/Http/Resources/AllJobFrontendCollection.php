<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AllJobFrontendCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'min_experience' => $this->min_experience,
            'max_experience' => $this->max_experience,
        ];
    }
}
