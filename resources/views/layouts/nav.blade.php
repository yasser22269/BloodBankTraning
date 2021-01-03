

<!--nav-->
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('front/') }}/imgs/logo.png" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
                        <a class="nav-link" href="{{ url('/') }}">{{ trans("site.home") }} <span class="sr-only">(current)</span></a>
                    </li>
                    {{--  <li class="nav-item">
                        <a class="nav-link" href="#">عن بنك الدم</a>
                    </li>
                    <li class="nav-item {{ Request::is('Post') ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('Post') }}">المقالات</a>
                    </li>  --}}
                    <li class="nav-item {{ Request::is('donation-requests') ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('donation-requests') }}">{{ trans("site.donationrequests") }}</a>
                    </li>
                    <li class="nav-item {{ Request::is('about-us') ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('about-us') }}">{{ trans("site.whoareus") }}</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('contact') }}">{{ trans("site.contact us") }}</a>
                    </li>
                </ul>
                @guest
                {{-- <!--not a member--> --}}
                <div class="accounts">
                    <a href="{{ route('register') }}" class="create">{{ trans("site.register") }}</a>
                    <a href="{{ route('login') }}" class="signin">{{ trans("site.login") }}</a>
                </div>

                @else
                <div class="member">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                            {{ auth()->user()->name }}

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: -3px">
                            {{--  <a class="dropdown-item" href="index-1.html">
                                <i class="fas fa-home"></i>
                                الرئيسية
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-user"></i>
                                معلوماتى
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-bell"></i>
                                اعدادات الاشعارات
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-heart"></i>
                                المفضلة
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comments"></i>
                                ابلاغ
                            </a>
                            <a class="dropdown-item" href="contact-us.html">
                                <i class="fas fa-phone-alt"></i>
                                تواصل معنا
                            </a>  --}}

                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endguest

                {{-- <!--I'm a member --}}
{{--
                <a href="#" class="donate">
                    <img src="{{ asset('front/') }}/imgs/transfusion.svg">
                    <p>طلب تبرع</p>
                </a> --}}



            </div>
        </div>
    </nav>
</div>
