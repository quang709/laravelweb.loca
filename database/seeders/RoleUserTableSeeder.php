<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            ['id_role' => 1, 'id_user' => 11],
            ['id_role' => 2, 'id_user' => 12], //author
            ['id_role' => 3, 'id_user' => 13], //censor
            ['id_role' => 4, 'id_user' => 14],

        ]);
    }
}
