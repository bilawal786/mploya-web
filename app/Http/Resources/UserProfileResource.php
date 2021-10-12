<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            $twentytwo = $jobseeker->video == '0' ? 0 : 1;
            $twentythree = $jobseeker->occupation == '0' ? 0 : 1;
            $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine + $ten + $eleven + $twelve + $thirteen
                + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen + $nineteen + $twenty + $twentyone + $twentytwo  + $twentythree + 3;
            $percentage = (int)round(($sum / 26) * 100);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'image' => $this->image,
            'profile_percentage' => $percentage,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
