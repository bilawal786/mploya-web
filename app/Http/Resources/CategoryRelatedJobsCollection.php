<?php

namespace App\Http\Resources;

use App\User;
use App\Bookmark;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryRelatedJobsCollection extends JsonResource
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
        return [
            'company_name' => $employer->company_name,
            'employer_image' => $employer->image,
            'job_title' => $this->job_title,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'isLike' => empty($islike) ? 0 : 1,
        ];
    }
}
