<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TowersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tower::create([
                'cell' => str_pad($index, 4, 0, STR_PAD_LEFT),
                'name' => $faker->colorName,
                'latitude' => $faker->numberBetween(10, 100) . $faker->numberBetween(10000, 99999),
                'longitude' => $faker->numberBetween(10, 100) . $faker->numberBetween(10000, 99999),
			]);
		}
	}

}