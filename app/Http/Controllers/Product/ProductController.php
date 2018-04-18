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
use Session;

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
        $product->price_promo = $postData['price_promo'];
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
        Session::flash('info', "Update Product: $product->name Sucessfully");
        return redirect()->intended(route('prod.index'));

    }

    public function index()
    {
        $products = Auth::user()->products;
        return view('Product.index', ['products' => $products]);
    }
    public function allindex()
    {
        $products = Product::all();
        return view('Product.allindex', ['products' => $products]);
    }

    public function addmore($id, Request $request)
    {
        $postData = Product::where('id', $id)->first();
        if (!empty($request->images)) {
            if (is_array($request->images) || is_object($request->images)) {

                foreach ($request->images as $photo) {

                    $file = ($photo);
//                    dd($photo);
                    $filename = $file->getClientOriginalName();
                    $destinationPath = public_path() . '/dealers/' . Auth::user()->email;
                    $file->move($destinationPath, $filename);
                    $final = 'dealers/' . Auth::user()->email . '/' . $filename;
//                    $final = $destinationPath . '/' . $filename;
                    Images::create(['products_id' => $postData->id, 'path' => $final, 'createby' => Auth::user()->email]);
                }
            }
        }
        Session::flash('info', "Add new Product: $postData->name Sucessfully");
        return redirect()->intended(route('prod.index'));
    }

    public function delete($id)
    {
        $prod = Product::FindOrFail($id);
        $prod->categories()->detach();
        $prod->delete();
        return redirect()->intended(route('prod.index'));
    }

    public function setimg($id, $prodid)
    {
        $prod = Product::FindOrFail($prodid);
        $img = Images::FindOrFail($id);

        $prod->thumbsnail = $img->path;
        $prod->save();
        return redirect()->intended(route('prod.index'));
    }

    public function imgindex($id)
    {
        $prod = Product::FindOrFail($id);

        $imglist = Images::where('products_id', $id)->get();
//        dd($imglist);

//        dd($list);
        return view('Product.editimage', ['images' => $imglist, 'product' => $prod]);
    }

    public function search(Request $request)
    {
        $strsearch = $request->searcher;
        $strsearch = '%' . $strsearch . '%';

//        dd($data);

//        dd($product);
//        var_dump($products);
        $tmp = Auth::user()->products;

        $data = Product::where('name', 'like', $strsearch)->orWhere('description', 'like', $strsearch)->orWhere('price', 'like', $strsearch)->orWhere('price_promo', 'like', $strsearch)->orWhere('promotion_id', 'like', $strsearch)
            ->orWhere('updated_at', 'like', $strsearch)->orWhere('created_at', 'like', $strsearch)->get();

        $products = array();
        foreach ($data as $single) {
//            dd($single->id);

            if ($tmp->contains('id',$single->id))
                $products[] = $single;
        }
//    dd($list);
//        $products = array();
//        foreach ($list as $single) {
//
//            $products[] = Product::where('id',$single);
//        }
//        dd($products);
        return view('Product.search', ['products' => $products]);
    }

    public function killimg($id, $prodid)
    {
//        dd($id);
        $imager = Images::where('id', $id)->first();
        $imager->delete();
        Session::flash('info', 'Delete Image Sucessfully');
        return redirect()->intended(route('prod.image.index', $prodid));
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
                    $destinationPath = public_path() . '/dealers/' . Auth::user()->email;
                    $file->move($destinationPath, $filename);
                    $final = 'dealers/' . Auth::user()->email . '/' . $filename;
//                    $final = $destinationPath . '/' . $filename;
                    Images::create(['products_id' => $postData->id, 'path' => $final, 'createby' => Auth::user()->email]);
                }
            }
        }
        Session::flash('info', "Add new Product: $postData->name Sucessfully");
        return redirect()->intended(route('prod.index'));
    }
}
