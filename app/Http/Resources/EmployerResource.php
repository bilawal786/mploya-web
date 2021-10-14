<?php

namespace App\Http\Resources;

use App\Job;
use App\User;
use App\Review;
use App\PruchasedSubscription;
use Illuminate\Http\Resources\Json\JsonResource;

use function GuzzleHttp\json_decode;

class EmployerResource extends JsonResource
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



        // percentage

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
        // end percentage
        $this->address == '0' ?   $address = '' : $address = $this->address;
        $this->company_name == '0' ?   $company_name = '' : $company_name = $this->company_name;
        $this->phone == '0' ?   $phone = '' : $phone = $this->phone;
        $this->video == '0' ?   $video = '' : $video = $this->video;
        $this->description == null ?   $description = '' : $description = $this->description;
        $this->language == null ?   $language = [] : $language = $this->language;
        $this->facebook_link == null ?   $facebook_link = '' : $facebook_link = $this->facebook_link;
        $this->instagram_link == null ?   $instagram_link = '' : $instagram_link = $this->instagram_link;
        $this->twitter_link == null ?   $twitter_link = '' : $twitter_link = $this->twitter_link;
        $this->linkedin_link == null ?   $linkedin_link = '' : $linkedin_link = $this->linkedin_link;

        $reviews = Review::where('receiver', '=', $this->id)->get();
        $jobs = Job::where('employer_id', '=', $this->id)->get();

        // subscription

        $postedJob = Job::where('employer_id', '=', $this->id)->count();

        $activeSubscription = PruchasedSubscription::where('employer_id', '=', $this->id)->first();
        $remainingPosterdJob = $activeSubscription == null ? 0 : (int)$activeSubscription->valid_job - $postedJob;

        return [
            'id' => $this->id,
            'deviceToken' => $this->deviceToken,
            'totalReview' => $totalReview,
            'fiveStarScore ' => $fiveStarScore,
            'activeSubscription' => $activeSubscription,
            'postedJob' => $postedJob,
            'remainingPosterdJob' => $remainingPosterdJob,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $address,
            'profile_percentage' => $percentage,
            'profile_status' => $this->profile_status,
            'phone' => $phone,
            'description' => $description,
            'company_name' => $company_name,
            'image' => $this->image,
            'video' => $video,
            'facebook_link' => $facebook_link,
            'instagram_link' => $instagram_link,
            'twitter_link' => $twitter_link,
            'linkedin_link' => $linkedin_link,
            'language' => $language,
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'reviews' => $reviews,
            'jobs' => $jobs,
        ];
    }
}
