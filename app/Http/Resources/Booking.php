<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
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
          'user' => $this->user,
					'date' => $this->date,
					'start_time' => $this->start_time,
					'end_time' => $this->end_time,
					'meeting_description' => $this->meeting_description,
					'facility' => $this->facility,
					'link' => '/bookings/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
