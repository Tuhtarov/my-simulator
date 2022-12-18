<?php

namespace App\Contracts;

use App\Models\Pet;

/**
 * Состариватель животных
 */
interface IPetAgingMachine
{
    public function ageIt(Pet $pet): Pet;
}
