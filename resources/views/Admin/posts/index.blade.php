@extends('Admin.layouts.app')

@section('title', 'Posts Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">المقالات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">المقالات</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <div class="card-tools">
                  <a href="{{ route('Admin.posts.create')}}">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add User">
                        <i class="material-icons">Add Posts</i>
                      </button>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>image</th>
                   <th>body</th>
                    <th>category</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                     @foreach ($posts as $post)


                  <tr>
                    <td>{{  $post->id}}</td>
                    <td>{{  $post->title}}</td>
                    <td> <img src="{{ asset('images/Posts/'.$post->image) }}"style='width:100px'class='img-thumbnail' alt=""></td>
                   <td>{{  Str::limit($post->body, 30)  }}</td>
                    <td>

                        {{ $post->category->name}}

                    </td>
                    <td class="td-actions ">
                    <a href="{{ route('Admin.posts.edit',$post->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Edit User">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.posts.destroy',$post->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove User">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $posts->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
