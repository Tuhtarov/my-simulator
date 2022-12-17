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
            'age' => $this->age,
            'created_at' => $this->created_at?->format('d.m.Y H:i'),
            'size' => self::computeSizeInPercent($this),

            'petType' => new PetTypeResource($this->petType)
        ];
    }

    public static function computeSizeInPercent(PetResource $pet): int
    {
        $maxAge = $pet->petType->age_max;
        $growth = $pet->petType->growth_factor;
        $age = $pet->age;

        $max = $maxAge * $growth;

        if ($age > $maxAge) {
            $age = $maxAge;
        }

        try {
            $result = (float)($age * $growth / $max) * 100;
        } catch (\DivisionByZeroError $e) {
            $result = 1;
        }

        return $result === 0 ? 1 : $result;
    }
}
