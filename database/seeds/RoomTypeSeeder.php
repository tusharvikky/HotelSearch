<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cities = ['Mumbai', 'New York', 'London', 'Hong Kong', 'Paris'];
        $roomTypes = ['mixed', 'female', 'double', 'private', 'family'];

        foreach($cities as $city) {
			
			for ($i = 0; $i < 6; $i++)
			{
				RoomType::create([
					'name' => $faker->sentence($nbWords = 4),
					'address' => $faker->address,
					'city' => $city,
					'description' => $faker->text($maxNbChars = 100),
					'base_price' => $faker->numberBetween($min = 100, $max = 1000),
					'room_type' => $roomTypes[array_rand($roomTypes)],
					'rating' => $faker->numberBetween($min = 40, $max = 100),
					'max_occupancy' => $faker->numberBetween($min = 2, $max = 4)
					]);

			}


        }

    }
}
