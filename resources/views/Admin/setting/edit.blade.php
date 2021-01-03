@extends('Admin.layouts.app')

@section('title', 'Edit setting Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">الاعدادت</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">الاعدادت</li>
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
            <form role="form" method="POST" action="{{ route('Admin.setting.update',$setting->id) }}">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="id" value="{{ $setting->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">phone</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" name="phone" value="{{ $setting->phone}}">
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $setting->email}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">facebook</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter facebook" name="facebook" value="{{ $setting->facebook}}">
                        @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">twitter</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter twitter" name="twitter" value="{{ $setting->twitter}}">
                        @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">insta</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter insta" name="insta" value="{{ $setting->insta}}">
                        @if ($errors->has('insta'))
                        <span class="help-block">
                            <strong>{{ $errors->first('insta') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">youtube</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter youtube" name="youtube" value="{{ $setting->youtube}}">
                        @if ($errors->has('youtube'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">about_app</label>
                        <textarea cols="30" rows="10" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter about_app" name="about_app" value="{{ old('about_app') }}">{{ $setting->about_app}}</textarea>
                        @if ($errors->has('about_app'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about_app') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">notification_text</label>
                        <textarea cols="30" rows="10" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter notification_text" name="notification_text" value="{{ old('notification_text') }}">{{ $setting->notification_text}}</textarea>
                        @if ($errors->has('notification_text'))
                        <span class="help-block">
                            <strong>{{ $errors->first('notification_text') }}</strong>
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

