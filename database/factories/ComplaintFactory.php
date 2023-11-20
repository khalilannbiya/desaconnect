<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(3, 15),
            'category_id' => $this->faker->numberBetween(1, 16),
            'title' => $this->faker->text(40),
            'body' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['belum diproses', 'sedang diproses', 'selesai']),
            'response' => null,
            'photo_url' => null,
            'unic_code' => $this->faker->unique()->numberBetween(000000, 999999),
            'is_private' => $this->faker->randomElement([true, false]),
            'is_anonymous' => $this->faker->randomElement([true, false]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
