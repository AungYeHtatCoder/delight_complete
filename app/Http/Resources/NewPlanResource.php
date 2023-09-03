<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewPlanResource extends JsonResource
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
            'plan_name' => $this->plan_name,
            'plan_code' => $this->plan_code,
            'price' => $this->price,
            'services' => ServiceResource::collection($this->whenLoaded('services')),
        ];
    }
}