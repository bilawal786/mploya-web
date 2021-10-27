<?php

namespace App\Http\Resources;

use App\Job;
use App\Bookmark;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryRelatedJobsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $islike = Bookmark::where('job_id', '=', $this->id)->where('jobseeker_id', '=', auth('api')->user()->id)->exists();


        return [
            'job_title' => $this->job_title,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
        ];
    }
}
