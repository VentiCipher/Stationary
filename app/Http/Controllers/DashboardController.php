<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use Session;
use Auth;
use DB;
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
    public function search(Request $request)
    {
        $strsearch = $request->searcher;
        $strsearch = '%'.$strsearch.'%';
//        dd(Auth::user()->products);
        $products = Product::where('name','like',$strsearch)->orWhere('description','like',$strsearch)->orWhere('price','like',$strsearch)->orWhere('price_promo','like',$strsearch)->orWhere('promotion_id','like',$strsearch)
            ->orWhere('updated_at','like',$strsearch)->orWhere('created_at','like',$strsearch)->orWhere('createby','like',$strsearch)->get();


        return view('Account.productindex',['products'=>$products]);
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
        $image_amount = PImages::all()->count();
        $product_amount = Product::all()->count();

        $dealeramount = User::where('roles','seller')->count();
        $just_user = User::where('roles','user')->count();
        $just_admin = User::where('roles','admin')->count();
        $last_user = User::orderby('created_at','desc')->limit(4)->get();
        $last_cat = Categories::orderby('created_at','desc')->limit(4)->get();
        //$last_user = User::all();
        return view('admin',['justadmin'=>$just_admin,'dealernumber'=>$dealeramount,'justuser'=>$just_user,'u_am'=>$user_amount,'cat_am'=>$cat_amount,'img_am'=>$image_amount,'pro_am'=>$product_amount,'last_users'=>$last_user,'last_cat'=>$last_cat]);
    }
}
