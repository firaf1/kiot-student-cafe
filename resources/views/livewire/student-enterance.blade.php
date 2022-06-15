<div>

    <div id="conn" class="off-canvus-menu" wire:ignore.self   >


        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box display-flex">
            @if($status == 0)
                <img src="giphy.gif" style="width:50%; margin-left:20%;   " alt="" srcset="">
            @else
                <div class="half-grid">
                    @if($student)
                        <img id="ownerpic" src="{{ asset($student->image) }}" style=" width: 400px; height: 400px;" />
                    @else
                        <img id="ownerpic" src="front/placeholder.jpg" style=" width: 400px; height: 400px;" />
                    @endif
                    {{-- <h2 style="font-size:40px; color: white;" id="staffName">Loading ...</h2>
                <h3 style="font-size:40px; color: white;" id="staffId">Loading ...</h3> --}}
                </div>

                <div class="half-grid desplay-flex" style="margin-top: 7rem; ">
                    <br>

                    <h4 style=" color: rgb(255, 255, 255);">Name: <span style=" color: rgb(245, 245, 245);"
                            id="name">@if($student) {{ $student->name }}
                        @else Loading... @endif</span></h4>
                            <h4 style=" color: rgb(255, 255, 255);">Name: <span style=" color: rgb(245, 245, 245);"
                                    id="name">@if($student) {{ $student->name }}
                                @else Loading... @endif</span></h4>
                                    <h4 style=" color: rgb(255, 255, 255);">Id Number: <span
                                            style=" color: rgb(255, 238, 5);" id="s_n">@if($student)
                                            {{ $student->id_number }}
                                        @else Loading... @endif</span></h4>
                                            <div class="offcanvas-facilities-box">
                                                <h4 style=" color: rgb(255, 255, 255);">Type: <span
                                                        style=" color: rgb(245, 245, 245);" id="Role">@if($student)
                                                        {{ $student->type }}
                                                    @else Loading... @endif</span></h4>
                                            </div>
                </div>
            @endif
        </div>

        <div class="offcanvas-footer">
            <div class="imgs justify-between">
                {{-- <img id="img1" src="{{ asset('front/phd.jpg') }}"
                style="width: 280px; height: 210px;" />
                <img id="img2" src="{{ asset('front/phd.jpg') }}"
                    style="width: 280px; height: 210px;" />
                <img id="img3" src="{{ asset('front/phd.jpg') }}"
                    style="width: 280px; height: 210px;" /> --}}
                @if($status == 0)
                    <h1 style="color: red; text-align: center; ">{{ $errorMessage }}</h1>
                @elseif($status == 1)
                    <h1 style="color: #ff3c3c; text-align: center;">{{ $errorMessage }}</h1>
                @else
                    <h1 style="color: rgb(115, 204, 115); text-align: center;">SUCCESSFULLY ATTENDED</h1>
                @endif
            </div>
            <div class="">
                <span>KIOT</span>
            </div>
        </div>
    </div>



    <!--=========================-->
    <!--=      Slider Section    =-->
    <!--=========================-->

    <section class="slider-wrapper" style="width:100%; height:100%; overflow:hidden;">

        <div class="slider">
            <div class="bounce mt-5">
                <img src="{{ asset('front/hom.png') }} " class="fa" alt="">
            </div>
        </div>
        <div class="slider-hexagon-wrapper">

            <ul>
                <li>
                    <div class="hexagon one color-four"></div>
                </li>
                <li>
                    <div class="hexagon one color-five"></div>
                </li>
                <li>
                    <div class="hexagon one color-one"></div>
                </li>
                <li>
                    <div class="hexagon one color-two"></div>
                </li>
                <li>
                    <div class="hexagon three color-three"></div>
                </li>
            </ul>
        </div>
        <div class="slider-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="slider-text-inner">
                            <img src="{{ asset('front/wollo.png') }}" style="margin-top:-5rem; "
                                width="500" />
                            <div class="sleider-heading">
                                <h1 onclick="openFullscreen();" style="color: darkolivegreen">Wollo<br>University <br>
                                    <span>Student Cafe<br> CHECK
                                        POINT</span></h1>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input style="opacity:0" class="form-control" id="rec" type="text" autofocus>
                                    {{-- <p style="color: red; font-size: 8pt">Type to check manually!</p> --}}
                                </div>

                                <div class="countdown-wrapper">
                                    <div class="countdown" data-count-year="2019" data-count-month="1"
                                        data-count-day="30"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <div class="slider-hex-right">
            <ul>
                <li data-aos="fade" data-aos-delay="3000" data-aos-duration="500">
                    <div class="hexagon one color-five"></div>
                </li>
                <li data-aos="fade" data-aos-delay="3000" data-aos-duration="1000">
                    <div class="hexagon one color-two"></div>
                </li>
                <li data-aos="fade" data-aos-delay="3000" data-aos-duration="1500">
                    <div class="hexagon one "></div>
                </li>
                <li data-aos="fade" data-aos-delay="3000" data-aos-duration="2000">
                    <div class="hexagon one color-one"></div>
                </li>
                <li data-aos="fade" data-aos-delay="3000" data-aos-duration="2500">
                    <div class="hexagon three color-three"></div>
                </li>
            </ul>
        </div>
        <div class="slider-net-right">
            <img class="svg" src="media/images/icon/net2.svg" alt="">
        </div>
        <!-- /.slider-hexagon-right -->
    </section>







</div>
