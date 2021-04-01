<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shoot extends JsonResource
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
					'start_date' => $this->start_date,
					'end_date' => $this->end_date,
					'status' => $this->status,
					'producer_1' => $this->producer_1,
					'producer_2' => $this->producer_2,
					'producer_3' => $this->producer_3,
					'producer_4' => $this->producer_4,
					'description' => $this->description,
					'link' => '/shoots/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
