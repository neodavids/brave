<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Facility extends JsonResource
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
					'type' => $this->type,
					'description' => $this->description,
					'link' => '/facilities/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
