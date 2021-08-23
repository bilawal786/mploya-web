<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'about' => $this->description,
            'company_name' => $this->company_name,
            'image' => $this->image,
            'video,' => $this->video,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'linkedin_link' => $this->linkedin_link,
            'language' => $this->language,
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
}
