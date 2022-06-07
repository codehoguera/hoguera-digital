<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDate>
 */
class UserDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'user_id' => \App\Models\User::all()->random()->id,
            'regional_id'  => \App\Models\Regional::all()->random()->id,
            'name' => $this->faker->name(),
            'first_lastname' => $this->faker->firstNameMale(),
            'second_lastname' => $this->faker->firstNameFemale(),
            'nro_ci' => $this->faker->randomNumber(8, true),
            'issued' => $this->faker->randomElement(['BN', 'SCZ', 'CB', 'CH', 'TJ', 'LP', 'OR', 'PT']),
            'nit' => $this->faker->ean8(),
            'birthday_date' => date($format = 'Y-m-d'),
            'city' => $this->faker->randomElement(['BENI', 'SANTA CRUZ', 'COCHABAMBA', 'CHUQUISACA', 'TARIJA', 'LA PAZ', 'ORURO', 'POTOSI']),
            'addres' => $this->faker->address(),
            'cell_personal' => $this->faker->ean8,
            'cell_work' => $this->faker->ean8,
            'email_personal' => $this->faker->email(),
            'code_teacher' => $this->faker->postcode(),
            'change_password' => $this->faker->boolean(),
            'verify_data' => $this->faker->boolean(),
        ];
    }
}
