
<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="language">
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="ar active">عربى</a>
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="en inactive">EN</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="social">
                    <div class="icons">
                        <a href="{{ $Setting->facebook }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Setting->insta }}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Setting->twitter }}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $Setting->phone }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-md-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>+{{ $Setting->phone }}</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>{{ $Setting->email }}</p>
                    </div>
                </div>

                 {{-- <!--I'm a member --}}

                {{--
                <div class="member">
                    <p class="welcome">مرحباً بك</p>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            احمد محمد
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index-1.html">
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
                            </a>
                            <a class="dropdown-item" href="index.html">
                                <i class="fas fa-sign-out-alt"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </div>
                </div> --}}



            </div>
        </div>
    </div>
</div>
