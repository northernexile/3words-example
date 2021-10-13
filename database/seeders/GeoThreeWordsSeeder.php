<?php

namespace Database\Seeders;

use App\Models\GeoThreeWords;

/**
 * Class GeoThreeWordsSeeder
 * @package Database\Seeders
 */
class GeoThreeWordsSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeoThreeWords::factory(2)->create([
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
            'three_words'=>implode('.',$this->faker->words(3))
        ]);
    }
}
