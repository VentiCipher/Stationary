<?php

namespace App\Http\Controllers\Product;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Response;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

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


    public function add($id)
    {
        $user = Auth::user();
        $product = Product::where('id', $id)->get();
        $data = array();
        $data['users_id'] = $user->id;
        $data['products_id'] = $product->first()->id;
        $updater = Wishlist::where('products_id', '=', $id)->first();
        if (Wishlist::where('products_id', '=', $id)->exists()) {

            Session::flash('status','This Product already in your wishlist!');
        } else {
//            Cart::create($data);
            Wishlist::create($data);
            Session::flash('status','Added Product to wishlist');
        }
        return redirect()->back();
    }

    public function remove($id)
    {
//        dd($id);
//        $user = Auth::user();
//        $product = Product::where('id',id)->get();

        $cmd = Wishlist::where('products_id', $id)->where('users_id', Auth::user()->id)->delete();
        $cmd = Wishlist::all();
//        dd($cmd);
        Session::flash('status', 'Removed Product from wishlist');
        return redirect()->back();
    }

    public function index()
    {
        $user = Wishlist::select('products_id')->where('users_id', Auth::user()->id)->get();

        $data = Product::all();
        $products = array();
        foreach ($data as $single) {
//            dd($single->id);

            if ($user->contains('products_id', $single->id))
                $products[] = $single;
        }
//        dd($products);
        return view('wishlist', ['wishlist' => $products]);
    }

}
