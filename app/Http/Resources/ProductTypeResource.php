<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\FileUploadsResource;

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
            'featured'      => FileUploadsResource::collection($this->images),
            'active'        => $this->active,
            'created_at'    => $this->created_at
        ];
    }
}
