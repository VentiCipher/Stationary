<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 5/10/2018
 * Time: 2:46 AM
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

class PublicOrderController extends Controller
{
    public function orderindexall(Request $request)
    {

        $useror = Order::all();
        return view('Invoice.orderuserindex', ['order' => $useror]);
    }
    public function seereceipt($id)
    {
        $order = Order::findOrFail($id);
        $pay = $order->payments;
      // dd($pay);
        return view('Invoice.receiptshow',['pay'=>$pay,'order'=>$order]);
    }
    public function index($id)
    {
        $tmp = Order::findOrFail($id);
        if (!$tmp->exists()) {
            Session::flash('error', "No Order ID You find out!");
            return redirect()->back();
        } else {
            $image = $tmp->products;
            $newcards = $tmp->cards;
            if(!empty($newcards))
            for ($i = 0; $i < 12; $i++) {
                $newcards[$i] = '*';
            }
            else
                $newcards = null;
            $paymenter = $tmp->payments;
            $data = Product::all()->sortByDesc('created_at')->take(5);
            $name = $tmp->payments;

            return view('Invoice.orderdetails',['cardsno'=>$newcards,'payment'=>$paymenter,'order'=>$tmp,'data'=>$data,'image'=>$image,'name'=>$name]);
        }

    }
    public function searchorderindex(Request $request)
    {

        $tmp = Order::where('ordercode','=',$request->searcher)->first();

//        dd($tmp);
        if (empty($tmp)) {
            Session::flash('error', "No Order ID You find out!");
            return redirect()->back();
        }
        else if(empty($tmp->payments->state))
        {
            Session::flash('error', "ORDER Not Payment! Please Login and make Payment");
            return redirect()->intended(route('login')) ;
        }
        else {
            $image = $tmp->products;
            $newcards = $tmp->cards;
            if(!empty($newcards))
                for ($i = 0; $i < 12; $i++) {
                    $newcards[$i] = '*';
                }
            else
                $newcards = null;
            $paymenter = $tmp->payments;
            $data = Product::all()->sortByDesc('created_at')->take(5);
            $name = $tmp->payments;

            return view('Invoice.orderdetails',['cardsno'=>$newcards,'payment'=>$paymenter,'order'=>$tmp,'data'=>$data,'image'=>$image,'name'=>$name]);
        }

    }
}