<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\PImages;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

use Session;
class UserAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
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

    public function showedit($id)
    {

        $curuser = Auth::user();

        return view('Account.useredit',['datauser'=>$curuser]);
    }
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|max:100|min:1',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|string|max:255',
            'password' => 'confirmed',
            
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->address = $request->address;
        
        $user->phonenumber = $request->phonenumber;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->paymentcard = $request->paymentcard;
        $user->roles = $request->roles;
        if($request->password == '')
        {
            $user->password = Hash::make($request['password']);
        }
        else
        {
            $user->password = Auth::user()->password();
        }
        //$user->profilepic = $request->profilepic;
        $user->save();
        Session::flash('status',"Your Account updated");
        return redirect()->intended(route('/'));
    }

    public function delete($id)
    {
        $cat = User::FindOrFail($id);
        $cat->delete();
        Session::flash('status','User Deleted');
        return redirect()->intended(route('logout'));
    }
}
