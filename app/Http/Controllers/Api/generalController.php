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
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class generalController  extends Controller
{
    public function settings()
    {
      $settings = Setting::select('phone','email','facebook','twitter','insta','youtube')->first();


        return responsejson(1,'loading....',$settings);

    }
    public function aboat_us()
    {
      $about_app = Setting::select('about_app')->get();

        return responsejson(1,'loading...',$about_app);

    }

    public function Governorate(Request $request )
    {

   $Governorate= Governorate::get();


          return responsejson(1,"loading",$Governorate);

    }
  public function cities(Request $request)
  {
      $cities= City::with('governorate')->get();

        return responsejson(1,"loading",$cities);

  }


  public function Blood_Type(Request $request)
  {
         $Blood_Type= Blood_Type::get();


        return responsejson(1,"loading", $Blood_Type);

  }
  public function categories(Request $request)
  {
         $categories= Category::get();


        return responsejson(1,"loading", $categories);

  }

  public function Notification(Request $request)
  {
         $Notification = Notification::with('donation_reguests')->get();


        return responsejson(1,"loading", $Notification);

  }

  public function contacts(Request $request)
  {
    $valdetor = validator()->make($request->all(),[
        'subject'=>"required",
        //'client_id'=> $request->user()->id,
        'message'=>"required",

    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }
        //$request->user()->id
        $Contact = new Contact;

        $Contact->subject = $request->subject;
        $Contact->message = $request->message;
        $Contact->client_id = auth()->guard('api')->user()->id;

        $Contact->save();

      //  $request->client_id =
       // dd($request->client_id);
        //$Contact = Contact::create($request->all());

      //  $Contact->client = auth()->guard('api')->user();
        return responsejson(1,"تم الارسال بنجاح",
        [
            "api_token" => $request->user()->api_token,
            "Contact" => $Contact,
        ]);

  }
}

?>
