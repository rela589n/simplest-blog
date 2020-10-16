<?php

use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    private static function limit(): int
    {
        return 500;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::limit(); ++$i) {


//            \App\Like::create(
//                [
//                    'user_id' => $faker->unique()
//                ]
//            )
        }
    }
}
