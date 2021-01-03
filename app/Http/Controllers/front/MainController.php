<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function whoAreUs(){

        $Setting = Setting::find(1);


        return view('front\about-us',compact('Setting'));

        }
        public function contact(){

            $Setting = Setting::find(1);


            return view('front\contact',compact('Setting'));

        }
        public function postcontact(Request $request){


            $request->validate([
                'subject'=> 'required',
                'message'=> 'required',

            ]);


                $Contact = new Contact();

                $Contact->subject = $request->subject;
                $Contact->message = $request->message;
                $Contact->client_id = auth()->user()->id;

                $Contact->save();


                return redirect()->route('home');

            }

        public function Post($id,Request $request){

            $Post = Post::find($id);
            $Posts = Post::all();
            $Setting = Setting::find(1);

        $favouritePost = $request->user()->posts()->find($id);

           // return $favouritePost;
            return view('front\Post',compact('Post','Setting',"Posts"));

        }
}
