<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkClickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $location = ['Romania', 'Polonia', 'Spania', 'Portugalia'];

        return [
            'link_id' => Link::inRandomOrder()->first(),
            'created_at' => $this->faker->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
            'location' => $location[array_rand($location)]
        ];
    }
}
