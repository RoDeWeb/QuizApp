<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => '1@1.com'],
            [
                'name' => 'user',
                'password' => Hash::make('password')
            ]
        );
    }
}
