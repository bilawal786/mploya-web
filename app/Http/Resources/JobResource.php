<?php

namespace App\Http\Resources;

use App\User;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $employer = User::find($this->employer_id);
        $cat = Category::find($this->category_id);
        $subcat = Subcategory::find($this->subcategory_id);
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'category_name' => $cat->title,
            // new
            'subcategory_name' => $subcat->title,
            'requirements' => $this->requirements,
            'skills' => $this->skills,
            'link' => $this->link,
            'vacancies' => $this->vacancies,
            'job_type' => $this->job_type,
            'salary_type' => $this->salary_type,

            // end new
            'job_title' => $this->job_title,
            'company_name' => $employer->company_name,
            'employer_phone' => $employer->phone,
            'employer_image' => $employer->image,
            'employer_address' => $employer->address,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'min_experience' => $this->min_experience,
            'max_experience' => $this->max_experience,
            'date' => $this->created_at,
        ];
    }
}
