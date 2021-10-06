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
            // new
            $nine = $jobseeker->video == '0' ? 0 : 1;
            $ten = $jobseeker->educations == null ? 0 : 1;
            $eleven = $jobseeker->experiences == null ? 0 : 1;
            $twelve = $jobseeker->works == null ? 0 : 1;
            $thirteen = ($jobseeker->facebook_link == null) ? 0 : 1;
            $fourteen = ($jobseeker->instagram_link == null) ? 0 : 1;
            $fifteen = ($jobseeker->twitter_link == null) ? 0 : 1;
            $sixteen = ($jobseeker->linkedin_link == null) ? 0 : 1;
            // end new
            $seventeen = ($jobseeker->skill_name == null) ? 0 : 1;
            $eighteen = ($jobseeker->certification_name == null) ? 0 : 1;
            $nineteen = ($jobseeker->certification_year == null) ? 0 : 1;
            $twenty = ($jobseeker->certification_description == null) ? 0 : 1;
            $twentyone = ($jobseeker->language == null) ? 0 : 1;
            $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine + $ten + $eleven + $twelve + $thirteen
                + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen + $nineteen + $twenty + $twentyone  + 3;
            $percentage = (int)round(($sum / 23) * 100);
        }
        return [
            'id' => $this->id,
            'deviceToken' => $this->deviceToken,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'video' => $this->video,
            'image' => $this->image,
            'educations' => $this->educations,
            'experiences' => $this->experiences,
            'works' => $this->works,
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
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'linkedin_link' => $this->linkedin_link,
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
