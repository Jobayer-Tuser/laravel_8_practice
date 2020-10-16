<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;

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



/*
|--------------------------------------------------------------------------
| Eloquent Crud Select, Insert , Update, Delete
|--------------------------------------------------------------------------
|
*/
/* Instruction From Edwin Diaz


#insert a data in database
Route::('/besicinsertdata', function(){
   
    $post = new Post;
    
    $post->title = "New ELoquent Insert Data";
    $post->body = "This new post body";
        
    $post->title = $request->title; //this will come from input table
    
});

#get all data from post table to show
Route::get('/read', function(){
   $posts = Post::all();

    foreach($posts AS $eachPost){
        #echo "<h1>'.$eachPost['title'].'</h1>";
        return $eachPost->title;
    }
});



#this function is for find a data as per specific ID
Route::get('/find', function(){
   
    $posts = Post::find(3);
    return $posts->title;
    
});
Route::get('/findwhere', function(){
   
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
    
});




#Update data in data table
Route::get('/post/update', function(){
   
    Post::where('id', 2)->where('is_admin', 0)->update([
        'title' => 'New Title for this blog',
        'body' => ' New Body For this blog'
    ]);
});

#to delete data from the table
Route::get('/post/delete', function(){
    
    $post = Post::find(2);
    $post->delete();
    
});

Route::get('/post/delete2', function(){

    Post::destroy(2, 4, 5);
    Post::where('id', 5)->delete();
   
});

#softDelete function 
Route::get('/softdelete', function(){
   
    #$product_id = collect([1, 2, 3, 4, 5]); //colection of product ids
    #Product::where('id', '=', $product_id)->get()->first();
    #Product::whereIn('id', $product_id)->get();
    
    Post::find(4)->delete();
    
    #passing multiple value in where clase
    $query->where([
    ['column_1', '=', 'value_1'],
    ['column_2', '<>', 'value_2'],
    [COLUMN, OPERATOR, VALUE],
])
    
});

#readSoftDelete Data
Route::get('/readsoftdelete', function(){
   
    //$post = Post::find(1);
    //$post = Post::withTrashed()->where('id', 1)->get();
    //$post = Post::withTrashed()->where('is_admin', 0)->get(); //here is_admin is admin id
    //$post_id = collect([2,3]); see
    //$post = Post::onlyTrashed()->whereIn('id', $post_id)->get();
    
    return $post;
});

#restore deleted data
Route::get('/restore', function(){
    $post_id = collect([2,3]);
    $post = Post::withTrashed()->whereIn('id', $post_id)->restore();
    
});

#force delete data from database
Route::get('/forcedelete', function(){
   
    $post_id = collect([5,6]);
    $post = Post::withTrashed()->whereIn('id', $post_id)->forceDelete();
    
});

*/


/*
|--------------------------------------------------------------------------
| Eloquent Relationships
|--------------------------------------------------------------------------
| 
*/

#one to one relationship to get 1 post as per user
Route::get('/user/{id}/post', function($id){
   
    //without get it will return only the first column value 
    return User::find($id)->post->get();
    
    //if we want to get all value then we should use get
    //return User::find($id)->post->get();

    //if we want to get the specific column
    #return User::find($id)->post->title;
    #return User::find($id)->post->content;
    
});

# 1 to 1 relation to get user for the post {Inverse relationship}
Route::get('/post/{id}/user', function($id){
   
    return Post::find($id)->user;
    return Post::find($id)->user->name;
});

#one to many relationship
Route::get('/post', function(){
   
    $user = User::find(2);
    
    foreach($user->posts AS $post){
        
        echo $post['title'] .'<br/>';
        echo $post['body'] ;
        
    }
});

#many to many relationship
Route::get('/user/{id}/role', function($id){
    
   // return $user = User::find($id)->roles()->orderBy('id', 'desc')->get; or 
   // return $user = User::find($id)->roles()->orderBy('name')->get(); or 
   $user = User::find($id);
   
   foreach($user->roles AS $role){
       
       return $role->name;
   }
   
});

#many to many relationship [Inverse relationship]
Route::get('role/{id}/user', function($id){
    
    //return $role = Role::find($id)->users()->orderBy('id', 'desc')->get();
    //return $role = Role::find($id)->users()->orderBy('name')->get();
    return $role = Role::find($id);
    
    foreach($role->users AS $user){
        
        return $user->name;
    }
});



Route::get('user/{id}/country', function($id){
    
    $country = Country::find($id);
    
    #return $country;
    
    foreach($country->posts AS $post){
        
        return $post;
    }
    
});
?>

