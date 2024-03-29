<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'notes'         => $this->notes,
            'featured'      => $this->featured,
            'active'        => $this->active,
            'created_at'    => $this->created_at,
            'products'      => $this->products,
            'variants'      => $this->variants,
        ];
    }
}
