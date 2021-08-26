<?php

namespace App\Http\Resources;

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
        if ($this->skill_name == "") {
            $skills = "";
        } else {
            $skills = array_slice($this->skill_name, 0, 3);
        }

        return [
            // 'users' => $this->users,
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'image' => $this->image,
            'skill_name' => $skills,
            'isLike' => $this->isLike,
        ];
    }
}
