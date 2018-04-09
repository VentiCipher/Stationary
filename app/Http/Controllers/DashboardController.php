<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
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
        
        return view('admin');
    }
}
