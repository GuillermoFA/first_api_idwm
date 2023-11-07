<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'symptoms' => $this->faker->text(),
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d H:i:s'),
        ];
    }
}
