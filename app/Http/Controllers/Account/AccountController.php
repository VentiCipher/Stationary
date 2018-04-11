<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\Images;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

use Session;
class AccountController extends Controller
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
        return view('Account.add');
    }
    public function index()
    {
        $users = User::all();
        return view(' Account.index',['users' => $users]);
    }
    public function showedit($id)
    {
        // dd("HELLO");
        $curuser = User::where('id',$id)->firstorfail();
        //dd($curuser);
        return view('Account.edit',['datauser'=>$curuser]);
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

        $user = User::where('id',$id)->firstorfail();
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
            $user->password = User::FindOrFail($id)->get()->password();
        }
        //$user->profilepic = $request->profilepic;
        $user->save();
        Session::flash('info',"Account $user->email updated");
        return redirect()->intended(route('acc.index'));
    }

    public function showapprove()
    {
        $alluser = User::where('dealer_approve','1')->get();
        return view('Account.approve',['users'=>$alluser]);
    }
    public function promoteadmin($id)
    {
        $account = User::where('id',$id)->firstorfail();
        $account->dealer_approve = '0';
        $account->roles = 'admin';
        $account->save();
        Session::flash('info',"Account $account->email promote to admin");
        return redirect()->intended(route('acc.index'));
    }
    public function promoteseller($id)
    {
        $account = User::where('id',$id)->firstorfail();
        $account->dealer_approve = '0';
        $account->roles = 'seller';
        $account->save();
        Session::flash('info',"Account $account->email promote to dealer");
        return redirect()->intended(route('acc.index'));
    }
    
    public function demote($id)
    {
        $account = User::where('id',$id)->firstorfail();
        $account->dealer_approve = '0';
        $account->roles = 'user';
        $account->save();
        Session::flash('info',"Account $account->email demote for dealer");
        return redirect()->intended(route('acc.show.manage'));
    }
    public function showmanage()
    {
        $alluser = User::where(['dealer_approve'=>'0','roles'=>'seller'])->get();
        return view('Account.manage',['users'=>$alluser]);
    }
    public function approved($id)
    {
        $account = User::where('id',$id)->firstorfail();
        $account->dealer_approve = '0';
        $account->roles = 'seller';
        $account->save();
        Session::flash('info',"Account $account->email approved for dealer");
        return redirect()->intended(route('acc.show.approve'));
    }
    public function rejected($id)
    {
        $account = User::where('id',$id)->firstorfail();
        $account->dealer_approve = '0';
        $account->roles = 'user';
        $account->save();
        Session::flash('info',"Account $account->email rejected for dealer");
        return redirect()->intended(route('acc.show.approve'));
    }
    public function createadd(Request $request)
    {
        //dd("HELLO");
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|max:100|min:1',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'birthdate' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        $cat = User::create($request->all());
        
      
        

        Session::flash('info','Users Added');
        return redirect()->intended(route('acc.index'));
    }

    public function delete($id)
    {
        $cat = User::FindOrFail($id);
        $cat->delete();
        Session::flash('info','User Deleted');
        return redirect()->intended(route('acc.index'));
    }
}
