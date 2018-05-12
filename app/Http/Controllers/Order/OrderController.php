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
use Mail;
define('OMISE_PUBLIC_KEY', 'pkey_test_5bv8bv1syowtocv6su4');
define('OMISE_SECRET_KEY', 'skey_test_5bv8bv1thehbkd5y3pq');
define('OMISE_API_VERSION', '2017-11-02');

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user()->name;

            return $next($request);
        });
    }

    public function showorderindex()
    {
        $useror = Auth::user()->orders->sortByDesc('updated_at');
        return view('Invoice.orderuserindex', ['order' => $useror]);
    }


    public function index()
    {

        $oldorder = Auth::user()->orders;

        $user = Cart::where('users_id', '=', Auth::user()->id)->get();
        $cart = Cart::all();
        $data = Product::all();
        $products = array();
        $sumup = 0.0;
        $promotion = 0.0;
        $deli = 0;
        foreach ($user as $cinfos) {
            $tmp = Product::whereId($cinfos->products_id)->firstOrFail();
            $products[] = $tmp;
            $sumup += $tmp->price * $cinfos->amount;
            if (!empty($tmp->price_promo)) {
                $promotion += ($tmp->price - $tmp->price_promo) * $cinfos->amount;
            }

            $deli += $tmp->users->first()->defaultdev == null ? 0 : $tmp->users->first()->defaultdev;
        }


        return view('revieworder', ['deli' => $deli, 'oldor' => $oldorder, 'wishlist' => $products, 'cart' => $user, 'total' => $sumup, 'promotiontotal' => $promotion]);
    }

    public function indexwithdata($id)
    {

        $oldorder = Auth::user()->orders;
        ##dd($usercart);
        $user = Cart::where('users_id', '=', Auth::user()->id)->get();
        $cart = Cart::all();
        $data = Product::all();
        $products = array();
        $sumup = 0.0;
        $promotion = 0.0;
        $deli = 0;
        foreach ($user as $cinfos) {
            $tmp = Product::whereId($cinfos->products_id)->firstOrFail();
            $products[] = $tmp;
            $sumup += $tmp->price * $cinfos->amount;
            if (!empty($tmp->price_promo)) {
                $promotion += ($tmp->price - $tmp->price_promo) * $cinfos->amount;
            }

            $deli += $tmp->users->first()->defaultdev == null ? 0 : $tmp->users->first()->defaultdev;

        }

        $orderdata = Order::findOrFail($id);

        return view('revieworderdata', ['deli' => $deli, 'orderdata' => $orderdata, 'oldor' => $oldorder, 'wishlist' => $products, 'cart' => $cart, 'total' => $sumup, 'promotiontotal' => $promotion]);
    }

    static function luhn_check($number)
    {

        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $number = preg_replace('/\D/', '', $number);

        // Set the string length and parity
        $number_length = strlen($number);
        $parity = $number_length % 2;

        // Loop through each digit and do the maths
        $total = 0;
        for ($i = 0; $i < $number_length; $i++) {
            $digit = $number[$i];
            // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit *= 2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            // Total up the digits
            $total += $digit;
        }

        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;

    }

    public function createorder(Request $request)
    {


        //dd($account); // your email will be printed on a screen.
        $newdeli = 0;
        $discount = 0;
        $cartuser = Auth::user()->carts->first();
        if (!empty($request->coupon)) {
            $promotioninfo = Promotion::where('promocoder', '=', $request->coupon)->first();
            if (empty($promotioninfo) && $promotioninfo->limit != 0) {
                Session::flash('error', $request->coupon . " is INVALID Coupon Code");
                return redirect()->back();
            } else {

                $discount = $promotioninfo->salemore;
                if ($request->total >= $promotioninfo->freeship) {
                    $newdeli = 1;
                }
            }
        }
        if (empty($request->delivery_cost)) {
            $request->delivery_cost = 0;
        }
        $name = $request->name;
        if (empty($request->name)) {
            $name = Auth::user()->name;
        }

        if ($request->methods == "creditcard") {
            if (!empty($request->cards)) {
                if (!$this->luhn_check($request->cards)) {
                    Session::flash('error', $request->cards . " is INVALID CREDITS | DEBIT CARDS Number");
                    return redirect()->back();
                }
            } else {
                Session::flash('error', "There's Empty CREDITS | DEBIT CARDS Number Please Enter if you choose pay by Cards");
                return redirect()->back();
            }
        }


        $now = Carbon::now();

        $date = Auth::user()->id . $now->day . $now->month . $now->year . $now->minute . $now->second;

        $request['ordercode'] = $date;
        $request['users_id'] = Auth::user()->id;


        $user = Cart::where('users_id', '=', Auth::user()->id)->get();
        $cart = Cart::all();
        $data = Product::all();
        $products = array();
        $sumup = 0.0;
        $promotion = 0.0;
        foreach ($user as $cinfos) {
            $tmp = Product::whereId($cinfos->products_id)->firstOrFail();
            $products[] = $tmp;
            if(!is_null($tmp->users->first()->freeshipwhenprice) && !empty(($tmp->users->first()->freeshipwhenprice)))
            {
                if($request->total >= $tmp->users->first()->freeshipwhenprice)
                {
                    $newdeli = 1;
                }
            }
            $sumup += $tmp->price * $cinfos->amount;
            if (!empty($tmp->price_promo)) {
                $promotion += ($tmp->price - $tmp->price_promo) * $cinfos->amount;
            }

//            $request->delivery_cost += $tmp->users->first()->defaultdev;
//            echo($request->delivery_cost);
        }
//        print_r($request->delivery_cost);
//        dd($request->total);
        $final = $request->total + $request->delivery_cost;
        $discount = 0;
        if ($newdeli == 1) {
            $discount += $request->delivery_cost;
            $request->delivery_cost = 0;
            $final = $request->total - $discount;
        }

        if ($final <= 20) {
            $final += 21 - $final;
            $request->delivery_cost = 21 - $final;
        }
        $request->name = $name;
        //Creating Credit cards payment
        //$pay = Payment::create(['users_id' => Auth::user()->id, 'methods' => $request->methods, 'state' => 0, 'final' => $final]);

        $request['total'] = $final;

        // $request['payments_id'] = $pay->id;
        $order = Order::create($request->all());
        //
        foreach ($products as $item) {
            foreach ($cart as $singlecart)
                if ($singlecart->products_id == $item->id)
                    $order->products()->attach($item, ['amount' => $singlecart->amount]);
        }
//        'users_id','methods','state',
        $newcards = $request->cards;
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


        $card_type = 'Undefine Card Type';

        foreach ($carders as $card => $pattern) {
            if (preg_match('/' . $pattern . '/', $request->cards)) {
                $card_type = $card;
                break;
            }
        }

        if ($request->methods == "creditcard")
            return view('Invoice.credit', ['name' => $name, 'orderid' => $order->id, 'cardno' => $request->cards]);
        else
            return view('Invoice.transfer', ['name' => $name, 'orderid' => $order->id]);


    }

    public function trypaid($id)
    {
        $request = Order::findorFail($id);
        $name = Auth::user()->name;
        if ($request->methods == "creditcard")
            return view('Invoice.credit', ['name' => $name, 'orderid' => $request->id, 'cardno' => $request->cards]);
        else
            return view('Invoice.transfer', ['name' => $name, 'orderid' => $request->id, 'cardno' => $request->cards]);
    }

    public function cancelorder($id)
    {

        $request = Order::findorFail($id);
        $prodinor = $request->products;
        foreach ($prodinor as $prod) {
            $request->products()->detach($prod);
        }
        $request->delete();
        Session::flash('status', "Successfully Cancel Order");
        return redirect()->intended(route('index'));
    }
}