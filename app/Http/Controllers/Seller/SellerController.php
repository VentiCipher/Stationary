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
        $promo = Promotion::where('promocoder','=',Auth::user()->codegiftwhenprice)->first();

        if(!is_null($promo) && $promo->limit <=0)
        {
            Session::flash('warning', 'Your Coupon limit is out now please update!');
            return redirect()->back();
        }

        $totalprod = Auth::user()->products->count();
        $prod = Auth::user()->products;
        $ima = array();
        $imagecount = 0;
        $nameuser = Auth::user();
        $allor = Order::all()->take(5);
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
        if($request->freeshipwhenprice < 0)
        {
            Session::flash('error', 'Faild to update Freeship price must >= 0');
            return redirect()->back();
        }
        if($request->couponwhenprice < 0)
        {
            Session::flash('error', 'Faild to update Coupon for upto price must >= 0');
            return redirect()->back();
        }
        if(empty($request->freeshipwhenprice))
        {
            $request->freeshipwhenprice = null;
        }
        if(empty($request->couponwhenprice))
        {
            $request->couponwhenprice = null;
        }
        if(empty($request->codegiftwhenprice))
        {
            $request->codegiftwhenprice = null;
        }
        if(!empty($request->codegiftwhenprice))
        {
            $promo = Promotion::where('promocoder','=',$request->codegiftwhenprice)->first();
            if(is_null($promo))
            {
                Session::flash('error', 'Faild to update Coupon doesn\'t exists please add in promotion first!');
                return redirect()->back();
            }
            if($promo->limit <=0)
            {
                Session::flash('error', 'Faild to update Coupon limit is over please set in promotion first!');
                return redirect()->back();
            }
        }

        $user = Auth::user();
        $user->shopname = $request->shopname;
        $user->defaultdev = $request->defaultdev;
        $user->freeshipwhenprice = $request->freeshipwhenprice;
        $user->couponwhenprice = $request->couponwhenprice;
        $user->codegiftwhenprice = $request->codegiftwhenprice;
        $user->save();
        Session::flash('status', 'Your shop has been updated');
        return redirect()->back();
    }
}
