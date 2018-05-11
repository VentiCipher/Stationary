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

class CartController extends Controller
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
        $data['amount'] = 1;
        if($product->first()->in_stock <=0)
        {
            Session::flash('error', 'This Product just ran out from stock');
            return redirect()->back();
        }

        $updater = Cart::where('products_id', '=', $id)->where('users_id', Auth::user()->id)->first();
        if (Cart::where('users_id', Auth::user()->id)->where('products_id', '=', $id)->exists()) {

                $updater->amount = $updater->amount + 1;
                $updater->save();


        } else
            Cart::create($data);
        Session::flash('status', 'Added Product to cart');
        return redirect()->back();
    }

    public function decrease($id)
    {
        $cmd = Cart::where('products_id', $id)->where('users_id', Auth::user()->id)->first();

        if ($cmd->exists())

            if ($cmd->amount > 1) {
                $cmd->amount = $cmd->amount - 1;
                $cmd->save();
            } else {
                $cmd->delete();
            }
        Session::flash('status', 'Remove 1 Quantity Product from cart');
        return redirect()->back();

    }

    public function remove($id)
    {
//        dd($id);
//        $user = Auth::user();
//        $product = Product::where('id',id)->get();

        $cmd = Cart::where('products_id', $id)->where('users_id', Auth::user()->id)->delete();
//        $cmd = Wishlist::all();
//        dd($cmd);
        Session::flash('status', 'Removed Product from cart');
        return redirect()->back();
    }

    public function index()
    {


        ##dd($usercart);
        $user = Cart::where('users_id', '=', Auth::user()->id)->get();

        $cart = Cart::all();
        $data = Product::all();
        $products = array();
        $sumup = 0.0;
        $promotion = 0.0;
        foreach ($user as $cinfos) {
            $tmp = Product::whereId($cinfos->products_id)->first();
            $cmd = Cart::where('products_id', $tmp->id)->where('users_id', Auth::user()->id)->first();
            if ($tmp->in_stock <= 0) {
                if ($cmd->exists())
                    $cmd->delete();

                continue;
            }
            else if($tmp->in_stock < $cmd->amount)
            {
                $cmd->amount = $tmp->in_stock;
                $cmd->save();
            }
            $products[] = $tmp;
            $sumup += $tmp->price * $cinfos->amount;
            if (!empty($tmp->price_promo)) {
                $promotion += ($tmp->price - $tmp->price_promo) * $cinfos->amount;
            }
        }


        return view('cart', ['wishlist' => $products, 'cart' => $user, 'total' => $sumup, 'promotiontotal' => $promotion]);
    }

}
