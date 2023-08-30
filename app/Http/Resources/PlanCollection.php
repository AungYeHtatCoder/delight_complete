<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlanCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return $this->collection->transform(function($plan) {
        //     return [
        //         'plan_name' => $plan->plan_name,
        //         'plan_code' => $plan->plan_code,
        //         'price' => $plan->price,
        //         'created_at' => $plan->created_at ? $plan->created_at->format('d-m-Y') : null,
        //         'updated_at' => $plan->updated_at ? $plan->updated_at->format('d-m-Y') : null,
        //     ];
        // })->all();

        return [
        'data' => $this->collection->map(function($plan) {
            return [
                'plan_name' => $plan->plan_name,
                'plan_code' => $plan->plan_code,
                'price' => $plan->price,
                'created_at' => $plan->created_at ? $plan->created_at->format('d-m-Y') : null,
                'updated_at' => $plan->updated_at ? $plan->updated_at->format('d-m-Y') : null,
            ];
        })->all(),
    ];
    }
    
}