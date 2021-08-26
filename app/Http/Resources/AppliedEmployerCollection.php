<?php

namespace App\Http\Resources;

use App\User;
use App\Bookmark;
use Illuminate\Http\Resources\Json\JsonResource;

class AppliedEmployerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $islike = Bookmark::where('job_id', '=', $this->job_id)->where('jobseeker_id', $this->user_id)->exists();
        $jobseekers = User::where('id', $this->user_id)->get();
        $id = '';
        $name = '';
        $email = '';
        $address = '';
        $image = '';
        $skills = '';
        foreach ($jobseekers as $jobseeker) {
            $id = $jobseeker->id;
            $name = $jobseeker->name;
            $email = $jobseeker->name;
            $address = $jobseeker->address;
            $image = $jobseeker->image;
            $skills = $jobseeker->skill_name;
        }



        if ($skills == "") {
            $skills = "";
        } else {
            $skills = array_slice($skills, 0, 3);
        }

        return [
            // 'users' => $this->users,
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'image' => $image,
            'skill_name' => $skills,
            'isLike' => $islike,
        ];
    }
}
