<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\Images;
use App\Cart;
use Session;
use Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        
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
        $user_amount = User::all()->count();
        $cat_amount = Categories::all()->count();
        $image_amount = Images::all()->count();
        $product_amount = Product::all()->count();

        $last_user = User::orderby('created_at','desc')->limit(4)->get();
        $last_cat = Categories::orderby('created_at','desc')->limit(4)->get();
        //$last_user = User::all();
        return view('admin',['u_am'=>$user_amount,'cat_am'=>$cat_amount,'img_am'=>$image_amount,'pro_am'=>$product_amount,'last_users'=>$last_user,'last_cat'=>$last_cat]);
    }
}
