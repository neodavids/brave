<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Department extends JsonResource
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
					'head_of_department' => $this->head_of_department,
					'link' => '/departments/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
