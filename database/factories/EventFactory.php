<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Performer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 100, 1),
            'fk_id_location' => Location::inRandomOrder()->first()->id_location,
            'fk_id_performer' => Performer::inRandomOrder()->first()->id_performer,
        ];
    }
}
