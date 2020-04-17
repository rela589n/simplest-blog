<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    const POSTS_LIMIT = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::POSTS_LIMIT; ++$i) {

            Post::create([
                'name' => $faker->realText(20),
                'content' => $faker->realText(1000),
                'uri_alias' => $faker->unique()->slug(2),
                'image_path' => $faker->unique()->imageUrl(),
                'category_id' => $faker->numberBetween(1, CategorySeeder::CATEGORIES_LIMIT)
            ]);
        }
    }
}
