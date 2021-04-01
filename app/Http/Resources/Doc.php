<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doc extends JsonResource
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
          'title' => $this->title,
					'download_link' => $this->download_link,
					'last_updated' => $this->last_updated,
					'link' => '/docs/'.$this->id,
					'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
