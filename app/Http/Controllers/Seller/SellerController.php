<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use Session;
use App\Http\Controllers\Controller;
use Auth;
use App\Promotion;
use App\Order;

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
        $allor = Order::all();
        $order = 0;

        $userbelongs = array();
        foreach ($allor as $orderitem) {

            foreach ($orderitem->products as $sinpro) {

            if($prod->contains('id',$sinpro->id))
                $order++;
            $userbelongs[] = $orderitem;
                continue;
            }
        }

        $promo = Promotion::where('createby', '=', Auth::user()->name)->get();
        $amount = 0;
        foreach ($prod as $item) {
            $amount += $item->in_stock;
        }
        return view('seller', ['userorown'=>$userbelongs,'productamount' => $totalprod, 'nameuser' => $nameuser, 'order' => $order, 'promo' => $promo, 'allstock' => $amount]);
    }
    public function setknow($id)
    {
        $order = Order::findOrFail($id);
        $order = $order->payments;
        if($order->state == 1)
        {
            $order->state = 2;
            Session::flash('status', 'Updated to Accept order');
        }
        else if($order->state == 2)
        {
            $order->state = 3;
            Session::flash('status', 'Updated to Delivery order');
        }
        else if($order->state == 3)
        {
            $order->state = 4;
            Session::flash('status', 'Updated to Delivered order');
        }
        $order->save();
        return redirect()->back();
    }
    public function setdeliver($id)
    {
        $order = Order::findOrFail($id);

        return redirect()->back();
    }

    public function updatefront(Request $request)
    {
        $user = Auth::user();
        $user->shopname = $request->shopname;
        $user->defaultdev = $request->defaultdev;

        $user->save();
        Session::flash('status', 'Your shop has been updated');
        return redirect()->back();
    }
}
