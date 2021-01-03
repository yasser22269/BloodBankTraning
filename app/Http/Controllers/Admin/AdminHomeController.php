<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{



    public function index()
    {
        //return auth()->user();
        $Contacts = Contact::count();
        $Posts = Post::count();
        $Clients = Client::count();
        $Donation_Reguests = Donation_Reguest::count();
      return view("Admin.home",compact('Contacts','Posts','Clients','Donation_Reguests'));
    }

    public function changePassword()
    {
        $admin =User::where('id',Auth()->user()->id)->first();

        return view("Admin.changePassword.edit",compact('admin'));

    }

    public function changePasswordupdate(Request $request)
    {
        $User = User::where('id',$request->id)->first();
        $requestArray = $request->all();

     if(isset($requestArray['password']) && $requestArray['password'] != ''){
        $requestArray['password'] = bcrypt($requestArray['password']);
      }else{
          unset($requestArray['password']);
      }
      $User->update(($requestArray));

      $admin =User::where('id',Auth()->user()->id)->first();
      $request->session()->flash('success', 'admin was successful Edited!');
        return view("Admin.changePassword.edit",compact('admin'));

    }

}
