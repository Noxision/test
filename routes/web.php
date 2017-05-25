<?php
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Subcategory;
use App\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $tasks = [
        'do',
        'all',
        'of'
    ];

    return view('pages.about')->with('tasks', $tasks);
});

Route::get('five', 'PageControllerFive@five');

Route::get('/assets/images/{filename}', 'PageControllerFive@img');

Route::get('subcategory', function() {
    $subcategories = DB::table('subcategories')->select('id', 'title', 'category_id')->get();
    foreach ($subcategories as $val) {
        $id = $val->id;
        $val->articles_count = DB::table('articles')->where('subcategory_id', $id)->count();
    }
    //$subcategories = Subcategory::all('title')->where('id', 2);
    //$subcategories = Subcategory::where('id', 1)->list('title');
    return $subcategories;
});

Route::get('sometext', function () {
    return "all ok";
});
