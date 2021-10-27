<?php

namespace App\Http\Resources;

use App\User;
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
        $json = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . request()->ip());
        $details = json_decode($json);
        $employer = User::find($this->employer_id);
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'latitude' => (float)$employer->latitude,
            'longitude' => (float)$employer->longitude,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'min_salary' => round($this->min_salary * $details->geoplugin_currencyConverter, 2),
            'max_salary' => round($this->max_salary * $details->geoplugin_currencyConverter, 2),
            'min_experience' => $this->min_experience,
            'max_experience' => $this->max_experience,
        ];
    }
}
