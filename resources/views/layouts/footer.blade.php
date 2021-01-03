<!--footer-->
<div class="footer">
    <div class="inside-footer">
        <div class="container">
            <div class="row">
                <div class="details col-md-4">
                    <img src="{{ asset('front/') }}/imgs/logo.png">
                    <h4>بنك الدم</h4>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى.
                    </p>
                </div>
                <div class="pages col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">

                        <a class="list-group-item list-group-item-action  {{ Request::is('/') ? "active" : "" }}" id="list-home-list" href="{{ url('/') }}" role="tab" aria-controls="home">الرئيسية</a>

                        <a class="list-group-item list-group-item-action  {{ Request::is('donation-requests') ? "active" : "" }}" id="list-settings-list" href="{{ url('donation-requests') }}" role="tab" aria-controls="settings">طلبات التبرع</a>

                        <a class="list-group-item list-group-item-action  {{ Request::is('about-us') ? "active" : "" }}" id="list-settings-list" href="{{ url('about-us') }}" role="tab" aria-controls="settings">من نحن</a>

                        <a class="list-group-item list-group-item-action  {{ Request::is('contact') ? "active" : "" }}" id="list-settings-list" href="{{ url('contact') }}" role="tab" aria-controls="settings">اتصل بنا</a>

                    </div>
                </div>
                <div class="stores col-md-4">
                    <div class="availabe">
                        <p>متوفر على</p>
                        <a href="#">
                            <img src="{{ asset('front/') }}/imgs/google1.png">
                        </a>
                        <a href="#">
                            <img src="{{ asset('front/') }}/imgs/ios1.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="other">
        <div class="container">
            <div class="row">
                <div class="social col-md-4">
                    <div class="icons">
                        <a href="{{ $Setting->facebook }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Setting->insta }}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Setting->twitter }}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $Setting->phone }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="rights col-md-8">
                    <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2020</p>
                </div>
            </div>
        </div>
    </div>
</div>
