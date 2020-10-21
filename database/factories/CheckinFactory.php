<?php

namespace Database\Factories;

use App\Models\Checkin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'ip' => $this->faker->ipv4
        ];
    }
}
