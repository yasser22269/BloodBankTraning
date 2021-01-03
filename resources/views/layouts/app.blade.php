<!doctype html>
<html  dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @if (app()->getLocale() == 'ar')



        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href="{{ asset('front/') }}/imgs/Icon.png">
        <!--owl-carousel css-->
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/owl.theme.default.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
        <!--style css-->
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/style.css">

        @else
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href="{{ asset('front/') }}/imgs/Icon.png">

        <!--owl-carousel css-->
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/owl.theme.default.min.css">

        <!--style css-->
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/style.css">

        <!--override on style css-->
        <link rel="stylesheet" href="{{ asset('front/') }}/assets/css/style-ltr.css">
        @endif
        <title>@yield('title')</title>
    </head>
    <body>
<div class="wrapper">


  <!-- Main Sidebar Container -->
        @include('layouts.side_bar')
  <!-- Content Wrapper. Contains page content -->

  <!-- Navbar -->
  @include('layouts.nav')

  <!-- /.navbar -->
  <div class="content-wrapper">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has($msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
      </div> <!-- end .flash-message -->


      @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
<script src="{{ asset('front/') }}/assets/js/bootstrap.bundle.js"></script>
<script src="{{ asset('front/') }}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('front/') }}/assets/js/owl.carousel.min.js"></script>
@if (app()->getLocale() == 'ar')


<script src="{{ asset('front/') }}/assets/js/main.js"></script>
@else
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('front/') }}/assets/js/main-ltr.js"></script>
@endif
@yield('js')
</body>
</html>
