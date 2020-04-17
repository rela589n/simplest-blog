<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    const CATEGORIES_LIMIT = 7;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::CATEGORIES_LIMIT; ++$i) {
            Category::create([
                'name' => $faker->realText(15),
                'description' => $faker->realText(300),
                'uri_alias' => $faker->unique()->slug(2)
            ]);
        }
    }
}
