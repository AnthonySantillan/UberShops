<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Travel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'starting' => $this->faker->streetAddress(),
            'arrival' => $this->faker->streetAddress(),
            'value' => $this->faker->buildingNumber(),

        ];
    }
}
