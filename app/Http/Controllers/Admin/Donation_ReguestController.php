<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation_Reguest;
use App\Models\Notification;

class Donation_ReguestController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $donations = Donation_Reguest::paginate(CountPaginate);

    return view("Admin.donations.index",compact('donations'));
  }



  public function show($id)
  {
    $donation = Donation_Reguest::findOrfail($id);

    return view("Admin.donations.show",compact('donation'));
  }

//   public function destroy($id)
//   {
//     $donation = Donation_Reguest::findOrfail($id);
//  //  $notifications = Notification::where('donation_reguest_id', $id)->get();
//   //  $notifications->delete();
//    // $donation->notifications->delete();
//     $donation->delete();

//     session()->flash('success', 'donation was successful Deleted!');
//     return back();
//   }

}

?>

