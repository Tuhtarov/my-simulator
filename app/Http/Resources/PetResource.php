<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->is_active,
            'is_dead' => $this->is_dead,
            'size' => $this->size,
            'age' => $this->age,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),

            'petType' => new PetTypeResource($this->petType)
        ];
    }
}
