<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Show extends JsonResource
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
					'show_description' => $this->show_description,
					'studio' => $this->studio,
					'start_time' => $this->start_time,
					'end_time' => $this->end_time,
					'link' => '/shows/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
