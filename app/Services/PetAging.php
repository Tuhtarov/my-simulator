<?php

namespace App\Services;

use App\Contracts\IPetAgingMachine;
use App\Models\Pet;

class PetAging implements IPetAgingMachine
{
    public function ageIt(Pet $pet): Pet
    {
        $pet->age = $pet->petType->age_max + 1;
        $pet->is_dead = true;
        $pet->save();

        return $pet;
    }
}
