<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            //admin

             //cate
            ['id_permission' => 1, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 2, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 3, 'id_role' => 1,'isAllowed'=>true],
            //tyoeofnews
            ['id_permission' => 4, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 5, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 6, 'id_role' => 1,'isAllowed'=>true],
            //news
            ['id_permission' => 7, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 8, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 9, 'id_role' => 1,'isAllowed'=>true],
            //slide
            ['id_permission' => 10, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 11, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 12, 'id_role' => 1,'isAllowed'=>true],
            //user
            ['id_permission' => 13, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 14, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 15, 'id_role' => 1,'isAllowed'=>true],
            //comment
            ['id_permission' => 16, 'id_role' => 1,'isAllowed'=>true],
            ['id_permission' => 17, 'id_role' => 1,'isAllowed'=>true],
            


            //author


             //cate
             ['id_permission' => 1, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 2, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 3, 'id_role' => 2,'isAllowed'=>false],
             //tyoeofnews
             ['id_permission' => 4, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 5, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 6, 'id_role' => 2,'isAllowed'=>false],
             //news
             ['id_permission' => 7, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 8, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 9, 'id_role' => 2,'isAllowed'=>true],
             //slide
             ['id_permission' => 10, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 11, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 12, 'id_role' => 2,'isAllowed'=>false],
             //user
             ['id_permission' => 13, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 14, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 15, 'id_role' => 2,'isAllowed'=>false],
             //comment
             ['id_permission' => 16, 'id_role' => 2,'isAllowed'=>false],
             ['id_permission' => 17, 'id_role' => 2,'isAllowed'=>false],

          


            //censor
            
             //cate
             ['id_permission' => 1, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 2, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 3, 'id_role' => 3,'isAllowed'=>false],
             //tyoeofnews
             ['id_permission' => 4, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 5, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 6, 'id_role' => 3,'isAllowed'=>false],
             //news
             ['id_permission' => 7, 'id_role' => 3,'isAllowed'=>true],
             ['id_permission' => 8, 'id_role' => 3,'isAllowed'=>true],
             ['id_permission' => 9, 'id_role' => 3,'isAllowed'=>true],
             //slide
             ['id_permission' => 10, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 11, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 12, 'id_role' => 3,'isAllowed'=>false],
             //user
             ['id_permission' => 13, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 14, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 15, 'id_role' => 3,'isAllowed'=>false],
             //comment
             ['id_permission' => 16, 'id_role' => 3,'isAllowed'=>false],
             ['id_permission' => 17, 'id_role' => 3,'isAllowed'=>false],


           

            //member


                //cate
                ['id_permission' => 1, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 2, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 3, 'id_role' => 4,'isAllowed'=>false],
                //tyoeofnews
                ['id_permission' => 4, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 5, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 6, 'id_role' => 4,'isAllowed'=>false],
                //news
                ['id_permission' => 7, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 8, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 9, 'id_role' => 4,'isAllowed'=>false],
                //slide
                ['id_permission' => 10, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 11, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 12, 'id_role' => 4,'isAllowed'=>false],
                //user
                ['id_permission' => 13, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 14, 'id_role' => 4,'isAllowed'=>false],
                ['id_permission' => 15, 'id_role' => 4,'isAllowed'=>false],
                //comment
                ['id_permission' => 16, 'id_role' => 4,'isAllowed'=>true],
                ['id_permission' => 17, 'id_role' => 4,'isAllowed'=>false],
   
           
           
        ]);
        
    }
}
