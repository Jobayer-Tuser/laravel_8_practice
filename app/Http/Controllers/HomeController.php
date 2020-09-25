<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function ProductPage(){
        return view('pages.product');
    }
}
