<?php


namespace Database\Seeders;


use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

/**
 * Class AbstractSeeder
 * @package Database\Seeders
 */
abstract class AbstractSeeder extends Seeder
{
    /** @var Faker|null  */
    protected $faker = null;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return app()->make(Faker::class);
    }
}
