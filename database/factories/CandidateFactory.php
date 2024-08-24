<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'Fname' => fake()->firstName(),
            'Lname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'DOB' => fake()->date(),
            'password' => bcrypt('password'),
            'phone' => fake()->phoneNumber(),
            'resume' => fake()->url(),
            'country' => fake()->country(),
            'role' => 'candidate',
        ];
    }
}
