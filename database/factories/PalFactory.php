<?php

namespace Database\Factories;

use App\Models\Pal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PalFactory extends Factory
{

    protected $model = Pal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
