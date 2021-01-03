<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\postRequest;
use App\Models\Category;
use App\Models\post;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_posts'])->only('index');
        $this->middleware(['permission:update_posts'])->only('edit');
        $this->middleware(['permission:create_posts'])->only('create');
        $this->middleware(['permission:delete_posts'])->only('destroy');

    }
  public function index()
  {
      $posts = post::paginate(CountPaginate);

    return view("Admin.posts.index",compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Categories = Category::get();

    return view("Admin.posts.create",compact('Categories'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(postRequest $request)
  {
    $requestArray =  $request->except('image');

    $fileName = "";
    if($request->hasFile('image')){
        $file = $request->file('image');
            $fileName = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/Posts/') , $fileName);
      $requestArray +=  ['image' => $fileName];
    }else{
      $requestArray +=  ['image' => "default.png"];

    }
    //  dd($requestArray);
   post::create($requestArray);

   $request->session()->flash('success', 'post was successful added!');
   return redirect()->route('Admin.posts.index');
  }

  public function edit($id)
  {
    $post = post::findOrfail($id);
    $Categories = Category::get();

    return view("Admin.posts.edit",compact('post','Categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(postRequest $request,$id)
  {
    $post = post::findOrfail($id);

    $requestArray =  $request->except('image');
  //  dd($requestArray);

    $fileName = "";
    if($request->image && $request->image !=''){
        $file = $request->file('image');
            $fileName = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/Posts/') , $fileName);
      $requestArray +=  ['image' => $fileName];

      $image_path = public_path('images/Posts/') . $post->image;
      if( $image_path !=  public_path('images/Posts/') ."default.png")
          File::delete($image_path);
    }
  //  dd($requestArray);

      $post->update(($requestArray));
   $request->session()->flash('success', 'post was successful Edited!');
    return redirect()->route('Admin.posts.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $post = post::findOrfail($id);
    $image_path = public_path('images/Posts/') . $post->image;
    if( $image_path !=  public_path('images/Posts/') ."default.png")
        File::delete($image_path);


    $post->delete();
    session()->flash('success', 'Post was successful Deleted!');
    return redirect()->route('Admin.posts.index');
  }

}

?>
