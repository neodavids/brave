<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Issue extends JsonResource
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
          'item_name' => $this->item_name,
					'description' => $this->description,
					'date' => $this->date,
					'location' => $this->location,
					'raised_by' => $this->raised_by,
					'department' => $this->department,
					'status' => $this->status,
					'solved_by' => $this->solved_by,
					'action_taken' => $this->action_taken,
					'cause_of_breakdown' => $this->cause_of_breakdown,
					'engineers_comment' => $this->engineers_comment,
					'link' => '/issues/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
