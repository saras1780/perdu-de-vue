<?php

namespace Database\Factories;

use App\Enums\Color;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $foundOn = fake()->dateTimeBetween('-20 days', 'now');
        $isReturned = fake()->boolean(20);

        return [
            'place_id' => Place::factory(),
            'name' => fake()->sentence(3),
            'description' => fake()->optional()->text(),
            'color' => fake()->randomElement(Color::cases()),
            'found_on' => $foundOn,
            'returned_at' => $isReturned ? fake()->dateTimeBetween($foundOn, 'now') : null,
        ];
    }
}
