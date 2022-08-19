@extends('frontend.layouts.main')
@section('home')

<div id="main-content" class="main-content">

<div class="welcome-us-block">
    <div class="container">
        <h4 class="title">{{$setting->company}}</h4>
        <div class="text-wraper">
<br>
        <p class="text-info">{!! $setting->introduce !!}</p>
        </div>
    </div>
</div>

<div class="why-choose-us-block">
    <div class="container">
        <h4 class="box-title">CÁC THÔNG TIN KHÁC</h4>
        <b class="subtitle">{{$setting->company}}</b>
        <div class="showcase">
            <div class="sc-child sc-left-position">
                <ul class="sc-list">
                    <li>
                        <div class="sc-element color-01">
                            <span class="biolife-icon icon-fresh-drink"></span>
                            <div class="txt-content">
                                <span class="number">01</span>
                                <b class="title">Địa chỉ 1</b>
                                <p class="desc">{{$setting->address}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sc-element color-02">
                            <span class="biolife-icon icon-healthy-about"></span>
                            <div class="txt-content">
                                <span class="number">02</span>
                                <b class="title">Địa chỉ 2</b>
                                <p class="desc">{{$setting->address2}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sc-element color-03">
                            <span class="biolife-icon icon-green-safety"></span>
                            <div class="txt-content">
                                <span class="number">03</span>
                                <b class="title">Địa thoại</b>
                                <p class="desc">{{$setting->phone}}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="sc-child sc-center-position">
                <figure><img src="{{$setting->image}}" alt="" width="622" height="656"></figure>
            </div>
            <div class="sc-child sc-right-position">
                <ul class="sc-list">
                    <li>
                        <div class="sc-element color-04">
                            <span class="biolife-icon icon-capacity-about"></span>
                            <div class="txt-content">
                                <span class="number">04</span>
                                <b class="title">Hotline</b>
                                <p class="desc">{{$setting->hotline}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sc-element color-05">
                            <span class="biolife-icon icon-arteries-about"></span>
                            <div class="txt-content">
                                <span class="number">05</span>
                                <b class="title">Facebook</b>
                                <p class="desc">{{$setting->facebook}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sc-element color-06">
                            <span class="biolife-icon icon-title"></span>
                            <div class="txt-content">
                                <span class="number">06</span>
                                <b class="title">Email</b>
                                <p class="desc">{{$setting->email}}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-block">
    <div class="container">
        <h4 class="box-title">Testimonial</h4>
        <ul class="testimonial-list biolife-carousel" data-slick='{"arrows":false,"dots":true,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-01.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Ms. Jay Doe</b>
                    <b class="title">Manager, Mycrosoft co.</b>
                    <div class="rating"><p class="star-rating"><span class="width-80percent"></span></p></div>
                </div>
            </li>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-02.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Mr. Braun</b>
                    <b class="title">Sales Manager</b>
                    <div class="rating"><p class="star-rating"><span class="width-90percent"></span></p></div>
                </div>
            </li>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-03.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Ms. Danien</b>
                    <b class="title">Marketing</b>
                    <div class="rating"><p class="star-rating"><span class="width-100percent"></span></p></div>
                </div>
            </li>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-01.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Ms. Jay Doe</b>
                    <b class="title">Manager, Mycrosoft co.</b>
                    <div class="rating"><p class="star-rating"><span class="width-80percent"></span></p></div>
                </div>
            </li>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-02.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Mr. Braun</b>
                    <b class="title">Sales Manager</b>
                    <div class="rating"><p class="star-rating"><span class="width-90percent"></span></p></div>
                </div>
            </li>
            <li>
                <div class="testml-elem">
                    <div class="avata">
                        <figure><img src="{{ asset('public/frontend')}}/assets/images/about-us/author-03.png" alt="" width="217" height="217"></figure>
                    </div>
                    <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    <b class="name">Ms. Danien</b>
                    <b class="title">Marketing</b>
                    <div class="rating"><p class="star-rating"><span class="width-100percent"></span></p></div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>

</div>
@endsection
