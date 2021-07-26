<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PurchasedSubscriptionCollection extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'valid_job' => $this->valid_job,
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
