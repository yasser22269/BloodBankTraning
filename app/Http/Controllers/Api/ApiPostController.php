<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ApiPostController extends Controller
{

   public function Posts(Request $request){

        $searsh =  $request->input('searsh');

       $post = Post::where('title', 'like', "%{$searsh}%")
                 ->orWhere('body', 'like', "%{$searsh}%")
                 ->with('category')->paginate(10);

      //  $post = Post::with('category')->get();

        return responsejson(1,'loading....',$post);

   }


   public function Post($id){

    $post = Post::with('category')->find($id);
    if(!$post)
        return responseJson(0,'not post found');

    return responsejson(1,'loading....',$post);

    }

    public function favouritePost(Request $request){

        $favouritePost = $request->user()->posts()->toggle($request->post_id);

        if(!$favouritePost)
        return responseJson(0,'not favourite Post found');

        return responsejson(1,'success',$favouritePost);

    }

    public function favouritePostsShow(Request $request){

        $favouritePost = $request->user()->posts()->with('category')->get();


        if(!$favouritePost)
        return responseJson(0,'not favourite Post found');


        return responsejson(1,'loading....',$favouritePost);
        //yasser
    }


}


