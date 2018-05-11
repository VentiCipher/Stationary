<?php

namespace App\Http\Controllers\Promotion;

use App\Subscriber;
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
use App\Promotion;
use Mail;
class PromotionController extends Controller
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

    public function showadd()
    {
        return view('Promotion.create');
    }
    public function showedit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('Promotion.edit',['promotion'=>$promotion]);
    }
    public function add(Request $request)
    {
        if(is_null($request->salemore)) {
            $request['salemore'] = 0;
        }
        if(is_null($request->limit)) {
            $request['limit'] = 1;
        }
        $newpro = Promotion::create($request->all());

        $sub = Subscriber::all();
//        dd($sub);
        foreach ($sub as $username) {
            $data = array('name' => $username->email);
            $data['newpro'] = $newpro;
            Mail::send(['html' => 'emails.promotion'], $data, function ($message) use ($data){
                $message->to($data['name'], $data['name'])->subject
                ('Promotion Updated!');
                $message->from('no-reply.trythis.stationary@gmail.com', 'Try This promotion No-reply');
            });
        }
        return redirect()->intended(route('promo.index'));
    }

    public function remove($id)
    {

        $cmd = Promotion::where('createby', Auth::user()->name)->where('id',$id)->delete();
        $cmd = Promotion::all();
//        dd($cmd);
        Session::flash('status', 'Removed Promotion from List');
        return redirect()->back();
    }
    public function allindex()
    {
        $promo = Promotion::all();
        return view('Promotion.index', ['promo' => $promo]);
    }
    public function index()
    {
        $promo = Promotion::where('createby','=',Auth::user()->name)->get();

        return view('Promotion.index', ['promo' => $promo]);
    }
    public function update(Request $request)
    {
        $promo = Promotion::findOrFail($request->id);
        $promo->salemore = $request->salemore;
        $promo->freeship = $request->freeship;
        $promo->info = $request->info;
        $promo->limit = $request->limit;
        $promo->promocoder= $request->promocoder;
        $promo->createby= $request->createby;
        $promo->save();
        return redirect()->intended(route('promo.index'));
    }

}
