<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entity>
 */
class EntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'regional_id' => \App\Models\Regional::all()->random()->id,
            'code_sie_entity' => $this->faker->postcode(),
            'name_entity' => $this->faker->company(),
            'dependence' => $this->faker->randomElement(['Fiscal', 'Privado', 'Convenio']),
            'status' => $this->faker->state,
            'municipal_district' => $this->faker->country(), 
            'educational_district' => $this->faker->country(),
            'religious_work' => $this->faker->name(),
            'monthly_payment' => $this->faker->name(),
            'address' => $this->faker->address,
            'school_principal' => $this->faker->company(), 
            'x_coordinate' => $this->faker->latitude(),
            'y_coordinate' => $this->faker->latitude(),
            'morning_shift' => $this->faker->boolean(),
            'late_shift' => $this->faker->boolean(),
            'night_shift' => $this->faker->boolean(),
        ];
    }
}
