@extends('Admin.layouts.app')

@section('title', 'Add post Home')


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
          <li class="breadcrumb-item"><a href="{{ route('Admin.posts.index') }}">المقالات</a></li>
          <li class="breadcrumb-item active">اضافة</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form role="form" method="POST" action="{{ route('Admin.posts.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                       @endif
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">body</label>
                        <textarea cols="30" rows="10"  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter body" name="body" value="{{ old('body') }}"></textarea>
                        @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                       @endif
                      </div>


                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="category_id" value="{{ old('category_id') }}">

                        @foreach ($Categories as $Category)
                      <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                      @endforeach

                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file"  name="image" class="form-control" >
                    @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                   @endif
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        </div>

</div>
</div>

  @endsection

