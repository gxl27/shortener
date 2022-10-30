<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $originalLinks = [
            'https://www.youtube.com/watch?v=r7qovpFAGrQ&list=RDr7qovpFAGrQ&start_radio=1',
            'https://stackoverflow.com/questions/56091086/php-faker-generate-unique-dates-in-range',
            'https://mail.google.com/',
            'https://stackoverflow.com/users/signup?ssrc=question_page&returnUrl=https%3A%2F%2Fstackoverflow.com%2Fquestions%2F56091086%2Fphp-faker-generate-unique-dates-in-range%23new-answer'
        ];

        return [
            'user_id' => User::inRandomOrder()->first(),
            'original_link' => $originalLinks[array_rand($originalLinks)],
            'shorten_link' => 'xxx',
            'description' => $this->faker->sentence(),
            'expired_at' => now()->format('Y-m-d')
        ];
    }
}
