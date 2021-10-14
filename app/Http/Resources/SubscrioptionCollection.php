<?php

namespace App\Http\Resources;

use App\Job;
use App\PruchasedSubscription;
use Illuminate\Http\Resources\Json\JsonResource;


class SubscrioptionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $active = PruchasedSubscription::where('subscription_id', '=', $this->id)->where('employer_id', '=', auth('api')->user()->id)->exists();

        $postedJob = Job::where('employer_id', '=', auth('api')->user()->id)->count();

        $activeSubscription = PruchasedSubscription::where('employer_id', '=', auth('api')->user()->id)->first();
        $remainingPostedJob = $activeSubscription == null ? 0 : (int)$activeSubscription->valid_job - $postedJob;
        if ($activeSubscription != null) {

            $v_job = (int)$activeSubscription->valid_job;
        } else {
            $v_job = 0;
        }


        return [
            'id' => $this->id,
            'postedJob' => $postedJob,
            'remainingPostedJob' => $remainingPostedJob,
            'v_job' => $v_job,
            'title' => $this->title,
            'price' => $this->price,
            'valid_job' => $this->valid_job,
            'status' => $this->status,
            'color' => $this->color,
            'description' => $this->description,
            'active' => empty($active) ? false : true,
        ];
    }
}
