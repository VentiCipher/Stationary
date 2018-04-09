<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Product;
use App\Image;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest'); //or auth
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $usr = Auth::user()->name;
            $cat = Category::all();
            $prod = Product::all();
            return view('index',['categories'=>$cat,'products'=>$prod,'username'=>$usr]);
        }
        else
        {
            $cat = Category::all();
            $prod = Product::all();
            $usr = "Guest";
            return view('index',['categories'=>$cat,'products'=>$prod,'username'=>$usr]);
        }
    }
}
