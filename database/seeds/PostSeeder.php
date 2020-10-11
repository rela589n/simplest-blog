<?php

use App\Lib\Faker\Providers\PicsumImage;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public const POSTS_LIMIT = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new PicsumImage($faker));

        for ($i = 0; $i < self::POSTS_LIMIT; ++$i) {
            $image = $faker->image('public/storage/uploads', 450, 180, null, false);

            Post::create(
                [
                    'name'        => $faker->realText(20),
                    'content'     => $faker->realText(1000),
                    'uri_alias'   => $faker->unique()->slug(2),
                    'image_path'  => "uploads/$image",
                    'category_id' => $faker->numberBetween(1, CategorySeeder::CATEGORIES_LIMIT),
                    'user_id'     => $faker->numberBetween(1, UsersSeeder::limit()),
                ]
            );
        }
    }
}
