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
use App\Models\Post;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class TokenController extends Controller
{
    public function tokens(Request $request){

        $tokens = Token::all();
       return responseJson(1 ,'success' , $tokens);
   }
   public function tokensRequest(Request $request){

       $token = $request->user()->tokens()->create($request->all());
       return responseJson(1 ,'success' , $token);
   }


}


