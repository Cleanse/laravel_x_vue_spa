<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_type_id' => $this->product_type_id,
            'name' => $this->name,
            'side_one' => $this->side_one_max,
            'side_two' => $this->side_two_max,
            'active' => $this->active,
            'created_at' => $this->created_at,
        ];
    }
}
