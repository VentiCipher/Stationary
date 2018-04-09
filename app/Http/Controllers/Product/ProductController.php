<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Product;
use App\Image;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('seller');
        
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user()->name;

            return $next($request);
        });
    }
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
    public function add()
    {
        return view('auth.register');
    }
}
