<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 5/8/2018
 * Time: 4:12 PM
 */

namespace App\Http\Controllers\Order;

use Carbon\Carbon;
use App\Order;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\Image;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Payment;
use App\Promotion;
use OmiseAccount;
use OmiseCharge;

define('OMISE_PUBLIC_KEY', 'pkey_test_5bv8bv1syowtocv6su4');
define('OMISE_SECRET_KEY', 'skey_test_5bv8bv1thehbkd5y3pq');
define('OMISE_API_VERSION', '2017-11-02');

class CreditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user()->name;

            return $next($request);
        });
    }

    public function generateInvoice($id)
    {

        $order = Order::findOrFail($id);


        $newdeli = 0;
        $discount = 0;

        if (!empty($order->coupon)) {
            $promotioninfo = Promotion::where('promocoder', '=', $order->coupon)->first();

            $discount = $promotioninfo->salemore;
            if ($promotioninfo->freeship == true) {
                $newdeli = 1;

            }
        }


        $products = $order->products;

        $final = $order->total;
        $discount = 0;
        if ($newdeli == 1) {
            $discount += $order->delivery_cost;
            $order->delivery_cost = 0;
        }
        $newcards = $order->cards;
        for ($i = 0; $i < 12; $i++) {
            $newcards[$i] = '*';
        }

        $carders = array(
            "VISA" => "(4\d{12}(?:\d{3})?)",
            "AMERICAN X PRESS" => "(3[47]\d{13})",
            "JCB" => "(35[2-8][89]\d\d\d{10})",
            "MAESTRO" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
            "SOLO" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
            "MASTERCARD" => "(5[1-5]\d{14})",
            "SWITCH" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
        );

        $promotion = Promotion::where('promocoder', $order->coupon)->first();
        $card_type = 'Undefine Card Type';

        foreach ($carders as $card => $pattern) {
            if (preg_match('/' . $pattern . '/', $order->cards)) {
                $card_type = $card;
                break;
            }
        }
//            foreach($products as $item) {
//                $usercart = Cart::where('users_id', '=', Auth::user()->id)->where('products_id', '=', $item->id)->first();
//                if ($usercart->exists())
//                    $usercart->delete();
//            }
        //Session::flash('status',"Payment Successfully Please Save this invoice");
        return view('Invoice.index', ['promotion' => $promotion, 'cardsname' => $card_type, 'newcards' => $newcards, 'orderinfo' => $order, 'prod' => $products, 'total' => $final, 'deli' => $order->delivery_cost, 'discount' => $discount, 'freeship' => $newdeli]);

    }

    public function bankPayment(Request $request)
    {

        $this->validate($request, [
            'filepath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $final="";
        $order = Order::findOrFail($request->orderid);


            $file = ($request->filepath);
//                    dd($photo);
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path() . '/users/' . Auth::user()->email;
            $file->move($destinationPath, $filename);
            $final = 'users/' . Auth::user()->email . '/' . $filename;
//                    $final = $destinationPath . '/' . $filename;
//        dd($destinationPath);

        $order = Order::findOrFail($request->orderid);
        $amount = $order->total;
        $methods = $order->methods;
        $pay = Payment::create(['filepath'=>$final,'name' => $request->name, 'users_id' => Auth::user()->id, 'orders_id' => $order->id, 'methods' => $methods, 'state' => 1, 'final' => $amount]);
        $order->payments_id = $pay->id;
        $order->save();
        if (!empty($order->coupon)) {

            $coupon = Promotion::where('promocoder', '=', $order->coupon)->first();
            if ($coupon->amount > 0) {
                $coupon->amount -= 1;
                $coupon->save();
            }

        }
        $products = Product::all();
        foreach ($products as $item) {
            $cmd = Cart::where('products_id', $item->id)->where('users_id', Auth::user()->id)->delete();
        }

        foreach ($order->products as $prod) {
            $tmp = Product::find($prod->id);
            $tmp->in_stock -= $prod->pivot->amount;
            $tmp->save();
        }

        Session::flash('status', "Payment Successfully Please Save this invoice");
        return redirect()->intended(route('invoice.generate', $order->id));
    }

    public function creditPayment(Request $request)
    {
        $order = Order::findOrFail($request->orderid);
        $amount = $order->total;
        $methods = $order->methods;
        $pay = Payment::create(['name' => $request->name, 'users_id' => Auth::user()->id, 'orders_id' => $order->id, 'methods' => $methods, 'state' => 1, 'final' => $amount]);
        $token = $request->omise_token;
        $order->payments_id = $pay->id;
        $order->save();

//        dd($request);
        $charge = OmiseCharge::create(array(
            'amount' => $amount * 100,
            'currency' => 'thb',
            'card' => $token,
            'description' => $order->ordercode
        ));

        if ($charge['status'] == "successful") {
            if (!empty($order->coupon)) {

                $coupon = Promotion::where('promocoder', '=', $order->coupon)->first();
                if ($coupon->amount > 0) {
                    $coupon->amount -= 1;
                    $coupon->save();
                }

            }
            $products = Product::all();
            foreach ($products as $item) {
                $cmd = Cart::where('products_id', $item->id)->where('users_id', Auth::user()->id)->delete();
            }

            foreach ($order->products as $prod) {
                $tmp = Product::find($prod->id);
                $tmp->in_stock -= $prod->pivot->amount;
                $tmp->save();
            }
            Session::flash('status', "Payment Successfully Please Save this invoice");
            return redirect()->intended(route('invoice.generate', $order->id));
        } else {

            Session::flash('error', "An Error has occurred cancelled order");
            return redirect()->intended(route('invoice.cancel', $order->id));
        }
        print_r($charge);
        print_r($amount);
    }
}