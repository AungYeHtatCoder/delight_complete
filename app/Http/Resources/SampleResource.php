<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SampleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
        'id' => $this->id,
        'name' => $this->name,
        'service_id' => $this->service_id,
        'photo' => $this->photo,
        'video' => $this->video,
        'content' => $this->content,
        'service' => new ServiceResource($this->whenLoaded('service')),
    ];
    }
}