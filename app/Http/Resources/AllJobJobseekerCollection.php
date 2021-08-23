<?php

namespace App\Http\Resources;

use App\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;



class AllJobJobseekerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $jobseeker_id = Auth::user()->id;
        $bookmarkjob = Bookmark::where('job_id', '=', $this->id)->where('jobseeker_id', '=', $jobseeker_id)->first();
        dd($bookmarkjob);
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'job_title' => $this->job_title,
            'salary' => $this->salary,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'experience' => $this->experience,
        ];
    }
}
