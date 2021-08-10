<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class SubcategoryCollection extends JsonResource
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
            'category_id' => $this->category_id,
            'title' => $this->title,
            'image' => $this->image,
        ];
    }
}
