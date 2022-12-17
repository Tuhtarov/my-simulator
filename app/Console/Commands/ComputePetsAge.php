<?php

namespace App\Console\Commands;

use App\Models\Pet;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ComputePetsAge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compute:age-pets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Увеличивает возраст активированных животных';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $availablePets = Pet::with('petType')
            ->where('is_active', '=', true)
            ->where('is_dead', '=', false);

        try {
            foreach ($availablePets->get() as $pet) {
                if ($pet->age > $pet->petType->age_max)
                    $pet->is_dead = true;
                else
                    $pet->age = $pet->age + 1;

                $pet->save();
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            return CommandAlias::FAILURE;
        }

        return CommandAlias::SUCCESS;
    }
}
