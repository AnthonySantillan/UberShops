<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plate' => $this->faker->bothify('?????-#####'),
            'color' => $this->faker->colorName(),
            'enrollmment' => $this->faker->date(),
            'year' => $this->faker->year('+10 years'),


        ];
    }
}
