<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class DonationsController extends Controller
{

   public function donations(){

        // $searsh =  $request->input('searsh');

    //    $post = Post::where('title', 'like', "%{$searsh}%")
    //              ->orWhere('body', 'like', "%{$searsh}%")
    //              ->with('category')->get();

        $donations = Donation_Reguest::paginate(10);
        
        if(!$donations)
        return responseJson(0,'not donations found');
            //with('client','blood_type','city')->
        return responsejson(1,'loading....',$donations);

   }


   public function donation($id){

    $donations = Donation_Reguest::with('client','blood_type','city')->find($id);

    if(!$donations)
        return responseJson(0,'not donation found');

    return responsejson(1,'loading....',$donations);

    }


    public function createDonation(Request $request)
    {
       // dd($request->user()->blood_type_id);
      $valdetor = validator()->make($request->all(),[
          'phone'=>"required",
          'age'=>'required',
          'hospital_address'=>"required",
          'name'=>"required",
          'notes'=>"required",
          'bags_num'=>"required",
          'latitude'=>"required",
          'longitude'=>"required",

      ]);
          if($valdetor->fails()){
              return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
          }
         //dd($request->all());
        $requestAdd = $request->all();
        $requestAdd +=[
              'client_id'=> $request->user()->id,
                'city_id'=> "required",//$request->user()->city_id,
                'blood_type_id'=> "required",//$request->user()->blood_type_id

        ];

          $Donation= Donation_Reguest::create($requestAdd);

          $clientsIds = $Donation->city->governorate->clients()
          ->whereHas('blood_type' ,function ($g) use ($request,$Donation) {

              $g->where('blood_types.id', $Donation->blood_type_id);
          })->pluck('clients.id')->toArray();
          if (count($clientsIds)) {

            // $notification = $Donation->notifications()->create([

            //     'title' => 'يوجد حاله تبرع قريبه منك ',
            //     'body' => $Donation->blood_type . 'محتاج متبرع لفصيله ',
            //     'donation_reguest_id' => $Donation->id
            // ]);

            $Notification = new Notification();
            $Notification-> title = 'يوجد حاله تبرع قريبه منك ';
            $Notification-> body = $Donation->blood_type->name . 'محتاج متبرع لفصيله ';
            $Notification-> donation_reguest_id = $Donation->id;
            $notification = $Notification->save();

            $Notification->clients()->attach($clientsIds);

        }

          return responsejson(1,"تم الحفظ بنجاح",
          [
              "api_token" => $request->user()->api_token,
              "client" => $Donation,
          ]
      );

    }


}


