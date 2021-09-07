<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slide')->insert([
        	['name'=>'slide 1','image'=>'1.jpg','content'=>'abc','link'=>'google','created_at' => new DateTime(),'updated_at'=> new DateTime()],
        	['name'=>'slide 2','image'=>'JOwt_2.jpg','content'=>'abc','link'=>'google','created_at' => new DateTime(),'updated_at'=> new DateTime()],
        ]);
    }
}


