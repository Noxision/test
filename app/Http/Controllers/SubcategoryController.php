<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Subcategory;
use App\Article;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Transformers\SubcategoryTransformer;

class SubcategoryController extends Controller
{
    use Helpers;
    public function index() {
        $subcategories = DB::table('subcategories')->select('id', 'title', 'category_id')->get();
        foreach ($subcategories as $val) {
            $id = $val->id;
            $val->articles_count = DB::table('articles')->where('subcategory_id', $id)->count();
        }
        //$subcategories = Subcategory::all('title')->where('id', 2);
        //$subcategories = Subcategory::where('id', 1)->list('title');
        return $this->response->collection($subcategories, new SubcategoryTransformer);
        //return $subcategories;
    }
}
