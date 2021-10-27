<?php

namespace App\Http\Resources;

use App\Job;
use Illuminate\Http\Resources\Json\JsonResource;


class PopularEmployerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $jobs = Job::where('employer_id', '=', $this->id)->where('role', '=', 'employer')->where('status', '=', 'open')->get();
        $total_jobs = count($jobs);
        return [
            'id' => $this->id,
            'address' => $this->address,
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'total_jobs' => $total_jobs,
        ];
    }
}
