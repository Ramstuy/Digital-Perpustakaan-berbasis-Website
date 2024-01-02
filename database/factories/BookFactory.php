<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>mt_rand(1,3),
            'category_id'=>mt_rand(1,3),
            'title'=>$this->faker->sentence(mt_rand(1,4)),
            'slug'=>$this->faker->slug(),
            'quantity'=>$this->faker->randomDigitNotNull(),
            'description'=>$this->faker->paragraph(mt_rand(10,30)),
            'file'=>$this->faker->sentence(mt_rand(1,5)),
            'cover'=>$this->faker->sentence(mt_rand(1,5))
        ];
    }
}
