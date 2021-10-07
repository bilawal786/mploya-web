<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class NotificationCollection extends JsonResource
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
            'sender_id' => $this->sender_id,
            'reciever_id' => $this->reciever_id,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }
}
