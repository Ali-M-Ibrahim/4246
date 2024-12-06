<?php

namespace Database\Factories;

use App\Models\property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    protected $model=property::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner-name'=> fake()->name(),
            'address'=>fake()->address(),
            'telephone'=>fake()->phoneNumber(),
            'image'=>fake()->imageUrl()
        ];
    }
}
