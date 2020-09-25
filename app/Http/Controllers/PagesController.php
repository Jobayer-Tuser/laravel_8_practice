<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //here we gona create a function and call it from the route
    public function indexPage(){
        #$title = 'Welcome To Laravel';
        #return view('pages.index', compact('title')); //old version technic
        return view('pages.index', ['title' =>'Welcome to Laravel']);
    }

    public function aboutPage(){
      $args = array(
        'name' => 'jobayer',
        'age' => 'I am 20 Years old'
    );
      return view('pages.about', $args);
    	#return view('pages.about', ['title' => 'Welcome to About page']);
    }

    public function productPage(){
      $args = array(
        'title' => 'This is our product page',
        'product' => ['Web Design', 'Web Development', 'SEO']
      );
      return view('pages.product', $args);
    	#return view('pages.product', ['title' => 'Welcome to Product page']);
    }
}
?>
