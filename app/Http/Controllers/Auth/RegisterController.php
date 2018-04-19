<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Wishlist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      //  dd($data);
     
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|max:100|min:1',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'birthdate' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        
        ]);
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $newpath ="";

        // if($data['profilepic'])
        // {
        //     $destinationPath =  storage_path().'/'.Auth::user()->email.'/';
        //     $file = $data->file('profilepic');
        //     $imgName =$file->getClientOriginalName();
        //     $data->profilepic->move($destinationPath, $imgName);
        //     $newpath = $destinationPath.'/'.$imgName;
        // }
       // $newdate = date_parse_from_format("Y-d-m", $data['birthdate']);
        //$data['birthdate']= ((string)$newdate['year']) +  ((string)$newdate['month']) + ((string)$newdate['day']);

        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'address' => $data['address'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            // 'profilepic' => $newpath,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address'=> $data['address'],
            'phonenumber' => $data['phonenumber'],
            'birthdate' => $data['birthdate'],
        ]);
    }
}