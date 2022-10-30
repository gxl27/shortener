<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $themes = ['default', 'dark'];
        return [
            'nume' => $themes[rand(0,1)],
        ];
    }
}
