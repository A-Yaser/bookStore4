<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$faker = Faker\Factory::create('ar_sa');

        return [
            //
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'pages_count'=> $this->faker->numberBetween(50, 1000),
            'status' => $this->faker->boolean(),
            'release_date' => $this->faker->date(),
            'price' => $this->faker->numberBetween(20, 800),
            'slug' => $this->faker->slug(),
        ];
    }
}
