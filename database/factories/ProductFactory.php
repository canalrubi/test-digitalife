<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name'     => $this->faker->word(),
            'price'    => $this->faker->numberBetween($min = 1, $max = 5000),
            'qty'      => $this->faker->randomNumber(3, false),
            'user_id'  => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
