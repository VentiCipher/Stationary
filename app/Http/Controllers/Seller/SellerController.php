<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;

class SellerController extends Controller
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
    public function index()
    {
        $totalprod = Auth::user()->products->count();
        $prod = Auth::user()->products;
        $ima = array();
        $imagecount = 0;
        $nameuser = Auth::user();
        return view('seller',['productamount'=>$totalprod,'nameuser'=>$nameuser]);
    }
}
