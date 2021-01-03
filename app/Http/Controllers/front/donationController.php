<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Donation_Reguest;
use App\Models\Setting;
use Illuminate\Http\Request;

class donationController extends Controller
{
    public function donations(Request $request){



           if( $request->has('search1') && $request->has('search2')){
                $searsh =  $request->input('search1');
                $searsh2 =  $request->input('search2');
                 $donations = Donation_Reguest::where('blood_type_id', 'LIKE', "%{$searsh}%")
                 ->orWhere('city_id', 'LIKE', "%{$searsh2}%")
                 ->paginate(8);
             }
        else if( $request->has('search2')){
            $searsh2 =  $request->input('search2');
             $donations = Donation_Reguest::Where('city_id', 'LIKE', "%{$searsh2}%")
             ->paginate(8);

         }
         else if( $request->has('search1') ){
        $searsh =  $request->input('search1');
         $donations = Donation_Reguest::where('blood_type_id', 'LIKE', "%{$searsh}%")
         ->paginate(8);

        }
        else
         $donations = Donation_Reguest::paginate(8);

        $blood_types = Blood_Type::all();
        $cities = City::all();
        $Setting = Setting::find(1);
        return view('front\donation-requests',compact('donations','cities','blood_types','Setting'));

   }

   public function donation($id){
    $Setting = Setting::find(1);
    $donation = Donation_Reguest::find($id);


    return view('front\donation-request',compact('donation','Setting'));

    }
    

}
