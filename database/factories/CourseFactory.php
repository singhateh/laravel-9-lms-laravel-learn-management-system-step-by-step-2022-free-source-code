<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->paragraph(),
            'summary' => $this->faker->paragraph(),
            'requirement' => $this->faker->paragraph(),
            'teacher_id' => 3,
            'code' => hexdec(uniqid()),
            'category_id' => $this->faker->numberBetween(1, 5),
            'status' => 'enabled',
            'price' => $this->faker->numberBetween(0, 1000),
            'duration' => $this->faker->numberBetween(2, 10),
            'started_at' => $this->faker->date(),
            'finished_at' => $this->faker->date(),
            'image' => ''
        ];
    }
}
