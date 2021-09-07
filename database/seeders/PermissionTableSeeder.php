<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission')->insert([
            ['name' => 'add_category'],
            ['name' => 'edit_category'],
            ['name' => 'delete_category'],

            ['name' => 'add_typeofnews'],
            ['name' => 'edit_typeofnews'],
            ['name' => 'delete_typeofnews'],

            ['name' => 'add_news'],
            ['name' => 'edit_news'],
            ['name' => 'delete_news'],

            ['name' => 'add_slide'],
            ['name' => 'edit_slide'],
            ['name' => 'delete_slide'],

            ['name' => 'add_user'],
            ['name' => 'edit_user'],
            ['name' => 'delete_user'],

            ['name'=>'comment'],
            ['name'=>'delete_comment'],

            
          
        ]);
    }
}
