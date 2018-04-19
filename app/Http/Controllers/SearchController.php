<?php

namespace App\Http\Controllers;

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

class SearchController extends Controller
{

    public function __construct()
    {

    }

    public function search(Request $request)
    {
        $strsearch = $request->searcher;
        $strsearch = '%' . $strsearch . '%';


        $data = Product::where('name', 'like', $strsearch)->orWhere('description', 'like', $strsearch)->orWhere('price', 'like', $strsearch)->orWhere('price_promo', 'like', $strsearch)->orWhere('promotion_id', 'like', $strsearch)
            ->orWhere('updated_at', 'like', $strsearch)->orWhere('created_at', 'like', $strsearch)->get();

        return view('indexsearch', ['products' => $data]);
    }
    public function showcat($id)
    {
//        dd($id);
        //get Data from Categories
//        $data = Product::with('categories')->where('categories_id','=',$id)->firstOrFail();
        $data = Categories::FindOrFail($id)->products;
//        dd($data);
        return view('indexsearch', ['products' => $data]);
    }
    public function showdetails($id)
    {
        $product = Product::FindOrFail($id);
        $imager = PImages::where('products_id',$id)->get();
        $catid = $product->categories->first();
//        dd($catid->id);
//        dd($imager);
        //$pdata = Categories::where('id',$catid->id)->limit(3)->orderby('id','desc')->get();
        $data = Categories::FindOrFail($catid->id)->products;

//        dd($data);
        return view('Product.showproduct',['prod'=>$product,'image'=>$imager,'data'=>$data]);
    }
}


?>