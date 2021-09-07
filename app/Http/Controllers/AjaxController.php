<?php

namespace App\Http\Controllers;

use App\Models\Typeofnews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class AjaxController extends Controller
{
    //

    public function getTypeofnews($id_category)
    {

        $typeofnews = Typeofnews::where('id_category', $id_category)->get();

        foreach ($typeofnews as $t) {

            echo "<option value='" . $t->id . "'>" . $t->name . "</option>";

        }
    }

    public function getCategorynews()
    {
        if (Request::ajax()) {

            // $url = $request->all();

            // $Ids = array();

            // $Ids = explode("=", $url);

            // return print_r($url);

            $news = Request::get('Ids');

            $type = Request::get('Id_typeofnews');

            $cate = Request::get('Id_category');

            // return print_r($cate);

            foreach ($news as $n) {
                DB::table('news')
                    ->where('id', $n)
                    ->update(['id_type_of_news' => $type]);

                DB::table('type_of_news')
                    ->where('id', $type)
                    ->update(['id_category' => $cate]);

            }

            return ['success' => 'ok'];
        }

    }

}
