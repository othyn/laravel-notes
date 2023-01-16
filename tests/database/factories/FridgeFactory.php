<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Othyn\LaravelNotes\Tests\Models\Fridge;

class FridgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fridge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room' => array_rand(array: [
                'kitchen',
                'utility',
                'garage',
                'bedroom',
            ]),
            'name' => $this->faker->name(),
        ];
    }
}
