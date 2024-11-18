<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = Employee::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->unique()->safeEmail,
      'phone' => $this->faker->phoneNumber,
      'job_title' => $this->faker->jobTitle,
      'salary' => $this->faker->randomFloat(2, 1000, 9000),
    ];
  }
}
