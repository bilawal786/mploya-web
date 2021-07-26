<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class EmployerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->projects);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'company_name' => $this->company_name,
            'image' => $this->image,
            'video' => $this->video,
            'social_links' => $this->social_links,
        ];
    }
}
