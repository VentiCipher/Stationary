<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\Images;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Response;

class ProductController extends Controller
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
        $allcat = Categories::all();
        return view('Product.add', ['allcat' => $allcat]);
    }

    public function showedit($id)
    {
        $prod = Product::FindOrFail($id);
        $catlist = $prod->categories;
        $list = array();
        foreach ($catlist as $catsingle) {
            $list[] = $catsingle->id;
        }
        // dd($list);
        $allcat = Categories::all();

//       dd($allcat);
        return view('Product.edit', ['product' => $prod, 'catlist' => $list, 'allcat' => $allcat, 'id' => $id]);
    }

    public function update($id, Request $request)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        $request['createby'] = Auth::user()->email;
        $postData = $request->except('categories');
//        $user = Auth::user();
//        dd($postData);
//        dd($product);
//        dd($postData['name']);
        $product->name = $postData['name'];
        $product->in_stock = $postData['in_stock'];
        $product->description = $postData['description'];
        $product->color = $postData['color'];
        $product->price = $postData['price'];
        $product->promotion_id = $postData['promotion_id'];

        $product->save();


        $product->categories()->detach();
        if (!empty($request->categories)) {
            if (is_array($request->categories) || is_object($request->categories))
                foreach ($request->categories as $singlecat) {
                    $cat = Categories::where('id', $singlecat)->firstorfail();

                    $product->categories()->attach($cat);
                }
        } else {
            $cat = Categories::where('name', "Misc")->firstorfail();
            $cat = $cat->id;
            $product->categories()->attach($cat);

        }
        return redirect()->intended(route('prod.index'));

    }

    public function index()
    {
        $products = Product::all();
        return view('Product.index', ['products' => $products]);
    }

    public function delete($id)
    {
        $prod = Product::FindOrFail($id);
        $prod->delete();
        return redirect()->intended(route('prod.index'));
    }

    public function createadd(Request $request)
    {
//        $this->validate($request, [
//            'image' => 'array',
//            'images.*' => 'image|mimes:jpeg,bmp,png,jpg'
//        ]);
        $request['createby'] = Auth::user()->email;
        $postData = $request->except('categories');
        $postData = Product::create($postData);
        $user = $request->user();
        $user->products()->attach($postData->id);


        if (!empty($request->categories)) {
            if (is_array($request->categories) || is_object($request->categories))
                foreach ($request->categories as $singlecat) {
                    $cat = Categories::where('id', $singlecat)->firstorfail();

                    $postData->categories()->attach($cat);
                }
        } else {
            $cat = Categories::where('name', "Misc")->firstorfail();
            $cat = $cat->id;
            $postData->categories()->attach($cat);

        }
        if (!empty($request->images)) {
            if (is_array($request->images) || is_object($request->images)) {

                foreach ($request->images as $photo) {

                    $file = ($photo);
//                    dd($photo);
                    $filename = $file->getClientOriginalName();
                    $destinationPath = storage_path() . '/dealers/' . Auth::user()->email;
                    $file->move($destinationPath, $filename);
                    $final = $destinationPath . '/' . $filename;
                    Images::create(['products_id' => $postData->id, 'path' => $final, 'createby' => Auth::user()->email]);
                }
            }
        }

        return redirect()->intended(route('prod.index'));
    }
}
