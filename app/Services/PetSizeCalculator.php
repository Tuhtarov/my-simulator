<?php

namespace App\Services;

use App\Http\Resources\PetResource;

class PetSizeCalculator
{
    public static function handle(PetResource $pet): int
    {
        $MAX_PERCENT = 100;
        $MIN_PERCENT = 1;

        $maxAge = $pet->petType->age_max;
        $growth = $pet->petType->growth_factor;
        $age = $pet->age;

        if ($age > $maxAge) {
            $age = $maxAge;
        }

        try {
            $currentPercent = (float)($age / $maxAge) * $MAX_PERCENT;

            if (!empty($growth) && $growth > 1) {
                $currentPercent *= $growth;
            }
        } catch (\DivisionByZeroError $e) {
        }

        $computedResult = empty($currentPercent) || $currentPercent < $MIN_PERCENT
            ? $MIN_PERCENT
            : $currentPercent;

        if ($computedResult > $MAX_PERCENT) {
            $computedResult = $MAX_PERCENT;
        }

        return $computedResult;
    }
}
