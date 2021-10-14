<?php

namespace App\Http\Resources;

use App\User;
use App\Review;
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
        // review 

        $totalReview = Review::where('receiver', '=', $this->id)->count();
        if ($totalReview != 0) {
            $fiveStarReview = Review::where('star', '=', 5)->where('receiver', '=', $this->id)->count();
            $fourStarReview = Review::where('star', '=', 4)->where('receiver', '=', $this->id)->count();
            $threeStarReview = Review::where('star', '=', 3)->where('receiver', '=', $this->id)->count();
            $twoStarReview = Review::where('star', '=', 2)->where('receiver', '=', $this->id)->count();
            $oneStarReview = Review::where('star', '=', 1)->where('receiver', '=', $this->id)->count();
            $totalScore = (5 * $fiveStarReview) + (4 * $fourStarReview) + (3 * $threeStarReview) + (2 * $twoStarReview) + (1 * $oneStarReview);
            $fiveStarScore = round($totalScore / $totalReview, 1);
        } else {
            $fiveStarScore = 0;
        }

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


        $address = $jobseeker->address == '0' ? '' : $jobseeker->address;
        $CNIC = $jobseeker->CNIC == '0' ? '' : $jobseeker->CNIC;
        $phone = $jobseeker->phone == '0' ? '' : $jobseeker->phone;
        $city = $jobseeker->city == '0' ? '' : $jobseeker->city;
        $country = $jobseeker->country == '0' ? '' :  $jobseeker->country;
        $father_name = $jobseeker->father_name == '0' ? '' : $jobseeker->father_name;
        $occupation = $jobseeker->occupation == '0' ? '' : $jobseeker->occupation;
        $description = $jobseeker->description == null ? '' : $jobseeker->description;
        // new
        $video = $jobseeker->video == '0' ? '' : $jobseeker->video;
        $educations = $jobseeker->educations == null ? [] : $jobseeker->educations;
        $experiences = $jobseeker->experiences == null ? [] : $jobseeker->experiences;
        $works = $jobseeker->works == null ? [] : $jobseeker->works;
        $facebook_link = ($jobseeker->facebook_link == null) ? '' : $jobseeker->facebook_link;
        $instagram_link = ($jobseeker->instagram_link == null) ? '' : $jobseeker->instagram_link;
        $twitter_link = ($jobseeker->twitter_link == null) ? '' : $jobseeker->twitter_link;
        $linkedin_link = ($jobseeker->linkedin_link == null) ? '' : $jobseeker->linkedin_link;
        // end new
        $skill_name = ($jobseeker->skill_name == null) ? [] : $jobseeker->skill_name;
        $certification_name = ($jobseeker->certification_name == null) ? '' : $jobseeker->certification_name;
        $certification_year = ($jobseeker->certification_year == null) ? '' : $jobseeker->certification_year;
        $certification_description = ($jobseeker->certification_description == null) ? '' : $jobseeker->certification_description;
        $language = ($jobseeker->language == null) ? [] : $jobseeker->language;

        $reviews = Review::where('receiver', '=', $this->id)->get();
        // dd($skill_name);

        return [
            'id' => $this->id,
            'deviceToken' => $this->deviceToken,
            'totalReview' => $totalReview,
            'fiveStarScore' => $fiveStarScore,
            'profile_status' => $this->profile_status,
            'name' => $this->name,
            'email' => $this->email,
            'occupation' => $occupation,
            'address' => $address,
            'video' => $video,
            'image' => $this->image,
            'educations' => $educations,
            'experiences' => $experiences,
            'works' => $works,
            'language' => $language,
            // 'experience' => $this->experience,
            'profile_percentage' => $percentage,
            'CNIC' => $CNIC,
            'phone' => $phone,
            'city' => $city,
            'country' => $country,
            'father_name' => $father_name,
            'description' => $description,
            'facebook_link' => $facebook_link,
            'instagram_link' => $instagram_link,
            'twitter_link' => $twitter_link,
            'linkedin_link' => $linkedin_link,
            'skill_name' => $skill_name,
            'certification_name' => $certification_name,
            'certification_year' => $certification_year,
            'certification_description' => $certification_description,
            'reviews' => $reviews,
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
}
