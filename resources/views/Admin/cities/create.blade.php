@extends('Admin.layouts.app')

@section('title', 'Add city Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">المحافظات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item"><a href="{{ route('Admin.cities.index') }}">المحافظات</a></li>
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
            <form role="form" method="POST" action="{{ route('Admin.cities.store') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label>City</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="governorate_id" value="{{ old('governorate_id') }}">

                            @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}"> {{  $governorate->name }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('city_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
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

