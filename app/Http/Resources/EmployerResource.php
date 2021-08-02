<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'social_links' => $this->social_links,
            'language' => $this->language,
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
}
