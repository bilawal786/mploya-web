<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'category_id' => $this->category_id,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'experience' => $this->experience,
        ];
    }
}
