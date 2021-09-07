<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert(
                [
                    'name' => 'User_' . $i,
                    'email' => 'user_' . $i . '@gmail.com',
                    'position' => 0,
                    'password' => bcrypt('123456'),
                    'created_at' => new DateTime(),
                ]
            );
        }
    }
}
