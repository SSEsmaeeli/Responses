<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'state_text' => $this->getStateTitle(),
            'state_color' => $this->getColor(),
            $this->mergeWhen($this->isOwner(auth()->user()->id), [
                'created_at' => $this->created_at,
            ]),
        ];
    }
}
