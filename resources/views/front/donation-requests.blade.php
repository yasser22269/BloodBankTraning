@extends('layouts.app')

@section('title', 'donation requests')

@section('content')
<div class="donation-requests">


  <!--inside-article-->
  <div class="all-requests">
      <div class="container">
          <div class="path">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                      <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                  </ol>
              </nav>
          </div>

          <!--requests-->
          <div class="requests">
              <div class="head-text">
                  <h2>طلبات التبرع</h2>
              </div>

              <div class="content">
                  <form class="row filter"  method="GET" >
                      <div class="col-md-5 blood">
                          <div class="form-group">
                              <div class="inside-select">
                                  <select class="form-control" id="exampleFormControlSelect1"name="search1" >
                                      <option selected disabled>اختر فصيلة الدم</option>
                                      @foreach ( $blood_types as $blood_type)


                                      <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>

                                      @endforeach
                                  </select>
                                  <i class="fas fa-chevron-down"></i>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-5 city">
                          <div class="form-group">
                              <div class="inside-select">
                                  <select class="form-control"name="search2" id="exampleFormControlSelect1">
                                      <option selected disabled>اختر المدينة</option>
                                      @foreach ( $cities as $city)


                                      <option value="{{ $city->id }}">{{ $city->name }}</option>

                                      @endforeach
                                  </select>
                                  <i class="fas fa-chevron-down"></i>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-1 search">
                          <button type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </form>
                  <div class="patients">
                      @foreach ($donations as $donation)


                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{ $donation->blood_type->name }}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span> {{ $donation->name }}</li>
                            <li><span>مستشفى:</span>  {{ $donation->hospital_address }}</li>
                            <li><span>المدينة:</span>  {{ $donation->city->name }}</li>
                        </ul>
                        <a href="{{ route('donation-request',$donation->id) }}">التفاصيل</a>
                    </div>
                    @endforeach
                </div>




                   <div class="pages">
                    <div class="text-center">
                        {{ $donations->links() }}
                    </div>
                      {{--  <nav aria-label="Page navigation example" dir="ltr">

                         <ul class="pagination">

                               <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                  </a>
                              </li>
                              <li class="page-item"><a class="page-link active" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">4</a></li>
                              <li class="page-item"><a class="page-link" href="#">5</a></li>
                              <li class="page-item"><a class="page-link" href="#">6</a></li>
                              <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                  </a>
                              </li>
                          </ul>
                      </nav>--}}
                  </div>
              </div>
          </div>
      </div>
  </div>



  </div>
  @endsection
