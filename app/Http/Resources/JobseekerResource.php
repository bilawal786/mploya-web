<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class JobseekerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->user_type == 'employer') {
            $employer = User::find($this->id);
            $one = $employer->image == 'assets/dist/img/profilepic.png' ? 0 : 1;
            $two = $employer->company_name == '0' ? 0 : 1;
            $three = ($employer->language == null) ? 0 : 1;
            $four = $employer->address == '0' ? 0 : 1;
            $five = ($employer->facebook_link == null) ? 0 : 1;
            $six = ($employer->instagram_link == null) ? 0 : 1;
            $seven = ($employer->twitter_link == null) ? 0 : 1;
            $eight = ($employer->linkedin_link == null) ? 0 : 1;
            $nin = $employer->phone == '0' ? 0 : 1;
            $ten = $employer->description == null ? 0 : 1;
            $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nin + $ten + 2;
            $percentage = (int)round(($sum / 12) * 100);
        } else {
            $jobseeker = User::find($this->id);
            $one = $jobseeker->address == '0' ? 0 : 1;
            $two = $jobseeker->CNIC == '0' ? 0 : 1;
            $three = $jobseeker->phone == '0' ? 0 : 1;
            $four = $jobseeker->image == 'assets/dist/img/profilepic.png' ? 0 : 1;

            $five = $jobseeker->city == '0' ? 0 : 1;
            $six = $jobseeker->country == '0' ? 0 : 1;
            $seven = $jobseeker->father_name == '0' ? 0 : 1;
            $eight = $jobseeker->description == null ? 0 : 1;


            $nine = ($jobseeker->education_name == null) ? 0 : 1;
            $ten = ($jobseeker->education_description == null) ? 0 : 1;
            $eleven = ($jobseeker->education_complete_date == null) ? 0 : 1;
            $twelve = ($jobseeker->education_is_continue == null) ? 0 : 1;

            $thirteen = ($jobseeker->project_title == null) ? 0 : 1;
            $fourteen = ($jobseeker->project_occupation == null) ? 0 : 1;
            $fifteen = ($jobseeker->project_year == null) ? 0 : 1;
            $sixteen = ($jobseeker->project_links == null) ? 0 : 1;

            $seventeen = ($jobseeker->project_description == null) ? 0 : 1;
            $eighteen = ($jobseeker->skill_name == null) ? 0 : 1;
            $nineteen = ($jobseeker->certification_name == null) ? 0 : 1;
            $twenty = ($jobseeker->certification_year == null) ? 0 : 1;
            $twentyone = ($jobseeker->certification_description == null) ? 0 : 1;

            $twentytwo = ($jobseeker->language == null) ? 0 : 1;


            $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine + $ten + $eleven + $twelve + $thirteen
                + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen + $nineteen + $twenty + $twentyone + $twentytwo + 2;
            $percentage = (int)round(($sum / 24) * 100);
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'video' => $this->video,
            'image' => $this->image,
            'language' => $this->language,
            'occupation' => $this->occupation,
            'experience' => $this->experience,
            'profile_percentage' => $percentage,
            'CNIC' => $this->CNIC,
            'phone' => $this->phone,
            'city' => $this->city,
            'country' => $this->country,
            'father_name' => $this->father_name,
            'description' => $this->description,
            'education_name' => $this->education_name,
            'education_description' => $this->education_description,
            'education_is_continue' => $this->education_is_continue,
            'education_complete_date' => $this->education_complete_date,
            'project_title' => $this->project_title,
            'project_occupation' => $this->project_occupation,
            'project_year' => $this->project_year,
            'project_links' => $this->project_links,
            'project_description' => $this->project_description,
            'skill_name' => $this->skill_name,
            'certification_name' => $this->certification_name,
            'certification_year' => $this->certification_year,
            'certification_description' => $this->certification_description,
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
}
