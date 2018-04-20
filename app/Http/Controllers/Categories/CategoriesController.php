<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        
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
        return view('Categories.create');
    }
    public function index()
    {
        $cat = Categories::all();
        return view(' Categories.index',['cat' => $cat]);
    }
    public function showedit($id)
    {
        $currentcat = Categories::FindOrFail($id);
        return view('Categories.edit',['cat'=>$currentcat]);
    }
    public function update($id,Request $request)
    {
        $currentcat = Categories::FindOrFail($id);
        $currentcat->name = $request->name;
        $currentcat->description = $request->description;
        $currentcat->save();
        
        Session::flash('status','Categories Updated');
        return redirect()->intended(route('indexcat'));
    }
    public function createadd(Request $request)
    {
        //dd("HELLO");
        $this->validate($request,[
            'name' => 'required|string|max:40',
            'description' => 'string|max:255',
            'createby' => $this->user,
            
        ]);
        $request['createby'] = Auth::user()->email;
        $cat = Categories::create($request->all());
        
      
        

        Session::flash('status','Categories Added');
        return redirect()->intended(route('indexcat'));
    }

    public function delete($id)
    {
        $cat = Categories::FindOrFail($id);
        $cat->delete();
        Session::flash('status','Categories Deleted');
        return redirect()->intended(route('indexcat'));
    }
}
