@extends('layouts.app')
@section('title', 'register')

@section('content')
<div class="create">
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create new account</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form method="POST" action="{{ route('register') }}" id="myform">
                    @csrf

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <input placeholder="Birth date" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="data_of_birth">
                        @error('data_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <select class="form-control" name="blood_type_id">
                            <option selected="">Blood type</option>
                            @foreach ($Blood_Types as $Blood_Type)
                               <option value="{{ $Blood_Type->id }}">{{ $Blood_Type->name }}</option>

                            @endforeach
                        </select>
                        @error('blood_type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <select class="form-control"  name="city_id">
                            <option selected="">City</option>
                            @foreach ($cites as $cite)
                            <option value="{{ $cite->id }}">{{ $cite->name }}</option>

                         @endforeach
                        </select>
                        @error('city_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <input type="tel" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone number" >

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <input placeholder="Last date for donation" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="last_donation_date">
                        @error('last_donation_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="create-btn">
                     <a href="#" onclick="document.getElementById('myform').submit()">create</a>
                            {{--  //  --}}
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="{{ asset('front/') }}/assets/js/bootstrap.bundle.js"></script>
<script src="{{ asset('front/') }}/assets/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
@endsection
