<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level' => $this->faker->numberBetween(1, 6),
            'front' => $this->faker->word,
            'back' =>  $this->faker->word,
            'user_id' => User::all('id')->random(),
        ];
    }
}
