<?php


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public static function limit(): int
    {
        return 20;
    }

    public function run(): void
    {
        User::create(
            [
                'name'     => 'Administrator',
                'email'    => 'admin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        $faker = Faker\Factory::create();

        for ($i = 1; $i < self::limit(); ++$i) {
            User::create(
                [
                    'name'     => $faker->name,
                    'email'    => $faker->unique()->email,
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
