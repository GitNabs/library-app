<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'             => $this->faker->title().rand(), // geneates unique title
            'author_id'         => Author::factory()->create(), // gets the id from the author once generated
            'publication_year'  => $this->faker->year(),
            'isbn'              => $this->faker->uuid(), // asdfqe-123.asd1231
            'available'         => $this->faker->boolean(),
        ];
    }
}
