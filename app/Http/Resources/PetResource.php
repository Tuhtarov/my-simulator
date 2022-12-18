<?php

namespace App\Http\Resources;

use App\Services\PetSizeCalculator;
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
            'age' => $this->age,
            'created_at' => $this->created_at?->format('d.m.Y H:i'),
            'updated_at' => $this->updated_at?->format('d.m.Y H:i'),
            'size' => PetSizeCalculator::handle($this),
            'petType' => new PetTypeResource($this->petType)
        ];
    }
}
