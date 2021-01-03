<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Donation_Reguest;
use App\Models\Post;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if( $request->has('search1') && $request->has('search2')){
            $searsh =  $request->input('search1');
            $searsh2 =  $request->input('search2');
             $donations = Donation_Reguest::where('blood_type_id', 'LIKE', "%{$searsh}%")
             ->orWhere('city_id', 'LIKE', "%{$searsh2}%")
             ->Limit(6)->get();
         }
    else if( $request->has('search2')){
        $searsh2 =  $request->input('search2');
         $donations = Donation_Reguest::Where('city_id', 'LIKE', "%{$searsh2}%")
         ->Limit(6)->get();

     }
     else if( $request->has('search1') ){
    $searsh =  $request->input('search1');
     $donations = Donation_Reguest::where('blood_type_id', 'LIKE', "%{$searsh}%")
     ->Limit(6)->get();

    }
    else
     $donations = Donation_Reguest::Limit(6)->get();

    $blood_types = Blood_Type::all();

    $cities = City::all();
    $Setting = Setting::find(1);
    $posts = Post::all();

    return view('home',compact('donations','cities','blood_types',"Setting","posts"));
    }
}
