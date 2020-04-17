<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CommentSeeder extends Seeder
{
    const COMMENTS_LIMIT = 100;

    const COMMENTABLES = [
        [
            'type'  => 'post',
            'limit' => PostSeeder::POSTS_LIMIT
        ],
        [
            'type'  => 'category',
            'limit' => CategorySeeder::CATEGORIES_LIMIT
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::COMMENTS_LIMIT; ++$i) {
            $commentable = Arr::random(self::COMMENTABLES);

            Comment::create([
                'author_name'      => $faker->name,
                'content'          => $faker->realText(150),
                'commentable_type' => $commentable['type'],
                'commentable_id'   => $faker->numberBetween(1, $commentable['limit'])
            ]);
        }
    }
}
