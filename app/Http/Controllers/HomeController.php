<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
   // {
   //     $this->middleware('auth');
   //     // ->only('firstname');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('contents/home');
    }

    // public function firstname(){
    //     // $user = auth()->user();
    //     // dd($user->user_details);

    //     $details = UserDetail::find(1);
    //     // dd($details->user);
    //     dd($details->user);
    // }
}
