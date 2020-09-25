<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;

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


/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function(){
  #this will redirect the default location view
  return redirect('about');
});

Route::get('/hello', function () {
    //return view('hello-world.com');
    return "Hellow World";
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/hello', function(){

   return "<h1> Hellow World</h1>";
});


Route::get('/home', function(){
    return view('pages.home');
});


Route::get('/product', function(){
   return view('pages.product');
});
Route::get('/{name}', function($name = null){
  return view('about', ['name' => $name]);
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This user name is ' .$name . 'his id is'. $id;
});

Route::get('/users/{name}?', function($name = null){
    return 'This user name is '. $name;
})-> where('name', '[a-zA-Z]+');

Route::get(/user/{id}?, function($id = null){
  return 'This user Id is ' . $id;
})-> where('id', '[0-9]+');

Route::get('/after-me', function(){
   return "<h2>How is going All</h2>";
});


Route::get('/after-me/{id}/{name}/{age}', function($id, $name, $age){
   return 'His name is ' .$name. ' age is '.$age.' And Id No. '. $id;
});

Route::get('/about', function(){
    return view('pages.about');
});

#another way to declare routes
Route::view("pageLink", "PageName");
Route::view("about", 'aboutPage');

Route::get('/', 'PagesController@indexPage') // previous version extension before laravel 8

#latest version example
Route::get('/home', [HomeController::class, 'ContactPage']);
Route::get('/about', [HomeController::class, 'aboutPage']);
Route::get('/product', [PagesController::class, 'productPage']);
Route::get('/about', [PagesController::class, 'aboutPage'])->name('index');

*/

Route::get('/', [PagesController::class, 'indexPage'])->name('index');

Route::get('/product', [PagesController::class, 'productPage'])->name('product');

Route::get('/about', [PagesController::class, 'aboutPage'])->name('about');

Route::get('/posts', [PostsController::class, 'getAllPost'])->name('posts');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/createPost', [PostsController::class, 'create'])->name('posts.create');

Route::post('add', [PostsController::class, 'addData'])->name('add.posts');

?>

