<?php

namespace Database\Factories;

use App\Models\GeoThreeWords;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class GeoThreeWordsFactory
 * @package Database\Factories
 */
class GeoThreeWordsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GeoThreeWords::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
            'three_words'=>implode('.',$this->faker->words(3))
        ];
    }
}
