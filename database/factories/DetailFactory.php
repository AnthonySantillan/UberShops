<?php

namespace Database\Factories;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 10),
            'payment_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->buildingNumber(),
            'delivery_date' => $this->faker->dateTime(),
            'delivery_time' => $this->faker->time(),
            'value' => $this->faker->buildingNumber(),

        ];
    }
}
