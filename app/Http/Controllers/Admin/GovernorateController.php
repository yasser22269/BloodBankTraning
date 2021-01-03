<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GovernorateRequest;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GovernorateController extends Controller
{

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Governorates = Governorate::paginate(CountPaginate);
    return view("Admin.Governorates.index",compact('Governorates'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    return view("Admin.Governorates.create");

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(GovernorateRequest $request)
  {
    $requestArray = $request->all();
    Governorate::create($requestArray);
   $request->session()->flash('success', 'Governorate was successful added!');
    return redirect()->route('Admin.Governorates.index');
  }

  public function edit($id)
  {
    $Governorate = Governorate::findOrfail($id);
    return view("Admin.Governorates.edit",compact('Governorate'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(GovernorateRequest $request,$id)
  {
    $Governorate = Governorate::findOrfail($id);

    $requestArray = $request->all();
      $Governorate->update(($requestArray));
   $request->session()->flash('success', 'Governorate was successful Edited!');
    return redirect()->route('Admin.Governorates.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $Governorate = Governorate::findOrfail($id);
    $Governorate->delete();
    session()->flash('success', 'Governorate was successful Deleted!');
    return redirect()->route('Admin.Governorates.index');
  }


}

?>
