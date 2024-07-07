<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Creator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100), // prix entre 1 et 100
            'type' => $this->faker->randomElement(Item::TYPES), // type parmi les valeurs définies
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Item $item) {
            // Faire varier aléatoirement le nombre de créateurs entre 1 et 3
            $creatorsCount = rand(1, 3);
            $creators = Creator::factory()->count($creatorsCount)->create();
            $item->creators()->attach($creators);
        });
    }
}