<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>ucfirst($this->faker->word()),
            'logo'=>$this->faker->image(),
            'email'=>$this->faker->email(),
            'website'=>$this->faker->url()
        ];
    }
}
