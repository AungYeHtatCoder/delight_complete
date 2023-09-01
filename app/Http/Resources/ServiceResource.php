<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'service_name' => $this->service_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'plans' => $this->plans, // You can also use a PlanResource here.
            'plans' => PlanCollection::collection($this->whenLoaded('plans')),
            'samples' => SimpleResource::collection($this->whenLoaded('sample')),
        ];
    }
}