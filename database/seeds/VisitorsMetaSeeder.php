<?php

use App\Models\VisitorMeta;
use Illuminate\Database\Seeder;

class VisitorsMetaSeeder extends Seeder
{
    const LIMIT = 20;

    private static $browsers = [
        'Firefox',
        'Chrome',
        'Edge'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::LIMIT; ++$i) {
            VisitorMeta::create([
                'browser' => \Illuminate\Support\Arr::random(self::$browsers),
                'ip'      => $faker->unique()->ipv4,
            ]);
        }
    }
}
