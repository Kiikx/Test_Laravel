<?php

namespace Database\Factories;

use App\Models\Creator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreatorFactory extends Factory
{
    protected $model = Creator::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'speciality' => $this->faker->randomElement(Creator::SPECIALITY), // Utilise les valeurs définies
        ];
    }
}