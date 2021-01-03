<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{


  public function register(Request $request)
  {
      //dd($request->all());
    $valdetor = validator()->make($request->all(),[
        'phone'=>"required",
        'password'=>'required|confirmed',
        'email'=>"required|unique:clients",
        'data_of_birth'=>"required",
        'blood_type_id'=>"required",
        'last_donation_date'=>"required",
        'city_id'=>"required",
         'name'=>"required",
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }
        $request->merge(['password'=>bcrypt($request->password)]);
       // dd($request->all());

        $client= Client::create($request->all());
         $client->api_token = Str::random(60);
        $client->save();


        $role = Role::where('name','user')->get()->first();
        $client->attachRole($role);


        return responsejson(1,"تم التسجيل بنجاح",
        [
            "api_token" => $client->api_token,
            "client" => $client,
        ]
    );

  }
  public function login(Request $request)
  {
      //dd($request->all());
    $valdetor = validator()->make($request->all(),[
        'phone'=>"required",
        'password'=>'required',
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }

        $client=Client::with('blood_type','city')->where('phone',$request->phone)->first();
    	if($client){

    		if(Hash::check($request->password,$client->password)){

    			return responsejson(1, 'تم التسجيل بنجاح',[
    				'api_token'=> $client->api_token,
                    'client'=> $client,
                    // 'bloodType'=> $client->blood_type->name,'governorate'=> $client->city->governorate->name,'city'=>$client->city->name,

    			]);
            }else
    		return responseJson(0,'هذه البيانات غير مطابقه');

    	}else{
    		return responseJson(0,'هذه البيانات غير مطابقه');
    	}
  }

  /////////////////////start resetPassword//////////////////////////////////////////////////

  public function resetPass(Request $request)
  {
      //dd($request->all());
    $valdetor = validator()->make($request->all(),[
        'phone'=>"required",
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }

        $client=Client::where('phone',$request->phone)->first();
    	if($client){
            $code = rand(1111,9999);
            $client->code_remember = $code ;

            if($client->save()){

                Mail::to($client->email)
                ->send(new ResetPassword($code));

    		    return responseJson(1,'برجاء فحص هاتفك',['pin_code'=>$code]);

            }else
    		    return responseJson(0,'حدث خطا حاول مرة اخرى');


    	}else{
    		return responseJson(0,'هذه البيانات غير مطابقه');
    	}
  }


  public function newpassword(Request $request)
  {
      //dd($request->all());
    $valdetor = validator()->make($request->all(),[
        'code_remember'=>"required",
        'password' => 'required',
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }

        $client=Client::where('code_remember',$request->code_remember)->where('code_remember','!=',0)->first();
    	if($client){

            // if($request->input('password') != $request->input('password_confirmation')){
            //     return responseJson(0,'كلمة السر غير مطابقة');
            // }

            $client->password = bcrypt($request->password);
            $client->code_remember = null;

            if($client->save()){
    		    return responseJson(1,'تم التغيير بنجاح');

            }else
    		    return responseJson(0,'حدث خطا حاول مرة اخرى');


    	}else{
    		return responseJson(0,'هذه البيانات غير مطابقه');
    	}
  }
  /////////////////////End resetPassword//////////////////////////////////////////////////


  /////////////////////start notification settings//////////////////////////////////////////////////

  public function notification_settings(Request $request)
  {
      //dd($request->all());
    $valdetor = validator()->make($request->all(),[
        'governorates.*' => 'exists:governorates,id',
        'blood_types.*'  => 'exists:blood_types,id',
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }

    $client = Client::where('api_token', $request->api_token)->first();
        if ($request->has('governorates')) {

            $client->governorates()->sync($request->governorates); // attach - detach() - toggle() - sync
        }

        if ($request->has('blood_types')) {
            $client->blood_type()->sync($request->blood_types);
        }
        $data = [
    //   'governorate_id' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
    // 'governorate_name' => $request->user()->governorates()->pluck('governorates.name')->toArray(),
    //   'blood_types_id'  => $request->user()->blood_type()->pluck('blood_types.id')->toArray(),
    //'blood_types_name'  => $request->user()->blood_type()->pluck('blood_types.name')->toArray(),

            'governorates'  => $client->governorates()->get(),
            'blood_type'  => $client->blood_type()->get(),
        ];
       return responseJson(1, 'تم الحفظ بنجاح', $data);//
  }
  /////////////////////End notification settings//////////////////////////////////////////////////

}

?>
