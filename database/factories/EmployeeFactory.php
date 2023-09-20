<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
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
            'company_id'=>rand(1,20),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->phoneNumber()
        ];
    }
}
