<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'job_title' => fake()->jobTitle(),
            'date' => fake()->date(),
            'salary' => fake()->optional()->randomFloat(2, 30000, 100000),
            'location' => fake()->city(),
            'description' => fake()->paragraph(),
            'emp_id' => \App\Models\Employer::factory(),
            'admin_id' => \App\Models\Admin::factory(),
            'cat_id' => \App\Models\Category::factory(),
        ];
    }
}
