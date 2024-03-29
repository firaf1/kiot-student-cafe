<div>

    <div id="conn" class="off-canvus-menu" wire:ignore.self>


        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box display-flex">
            @if($status == 0)
                <img src="giphy.gif" style="width:50%; margin-left:20%;   " alt="" srcset="">
                <h2 style="text-align:center; color:red;">{{ $errorMessage }}</h2>
            @else
                <div class="half-grid">

                    <img id="ownerpic " class="student-image" wire:loading.remove src="{{ asset($student->image) }}"
                        style=" width: 400px; height: 400px;" />

                    <img wire:loading id="ownerpic" src="front/placeholder.jpg" style=" width: 400px; height: 400px;" />


                    <h4 class="student-name">
                        <span wire:loading.remove> {{ $student->name }} </span>
                        <span wire:loading> Loading...</span>
                    </h4>
                    <h6 class="student-department">
                        <span wire:loading.remove id="name"> {{ $student->department }} </span>
                        <span wire:loading> Loading... </span>
                    </h6>
                    <!-- <h4 style=" color: rgb(255, 255, 255);">Name: 
                    <span style=" color: rgb(245, 245, 245);"   id="name"  wire:loading.remove> {{ $student->name }}   </span>
                    <span wire:loading> Loading...</span> -->
                    </h4>
                </div>

                <div class="half-grid desplay-flex">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col" style="color-black">
                                    <h4 style=" color: black;">ID Number    : </h4>
                                </th>
                                <th scope="col">
                                    <h6 wire:loading class="student-department">Loading...</h6>
                                    <h4 wire:loading.remove style=" color: black;">
                                        <span style=" color: rgb(255, 238, 5);" id="s_n">
                                            
                                                {{ $student->id_number }}
                                             
                                        </span>
                                    </h4>
                                </th>

                            </tr>
                            <tr>

                                <th scope="col" style="color-black">
                                    <h4 style=" color: black;">Cafeteria: </h4>
                                </th>
                                <th scope="col">
                                    <h6 wire:loading class="student-department">Loading...</h6>
                                    <button wire:loading.remove type="button" class="btn btn-warning">
                                        {{ $student->type }}
                                    </button>
                                </th>

                            </tr>
                        </thead>

                    </table>


                    <div class="offcanvas-facilities-box">
                        <img style="width:100%; height:100%;" wire:loading class="info-card_img-icon"
                            src="front/assets/img/loading.gif" alt="danger">

                        <div class="" wire:loading.remove>

                            @if($status == 0)
                                <div class="info-card info-card--danger">
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/danger.svg" alt="danger">
                                    </div>

                                    <div class="info-card_message"> {{ $errorMessage }}</div>

                                </div>
                            @elseif($status == 1)
                                <div class="info-card info-card--danger">
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/danger.svg" alt="danger">
                                    </div>

                                    <div class="info-card_message"> {{ $errorMessage }}</div>

                                </div>
                             @else
                             <div class="info-card info-card--success">
                                <div class="info-card_icon" style="margin-top:-2rem; ">
                                    <img class="info-card_img-icon" src="front/assets/img/success.svg" alt="success">
                                </div>
                                <h2 class="info-card_label">Successful</h2>
                                
                                </div>


                                 
                            @endif
                        </div>
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
                 
            </div>
            
        </div>
    </div>



    <!--=========================-->
    <!--=      Slider Section    =-->
    <!--=========================-->

    <section class="slider-wrapfper" style="width:100%; height:100%; overflow:hidden;">

        <div class="slider">
            <div class="bounce mt-5">
                <img src="{{ asset('front/hom.png') }} " class="fa" alt="">
            </div>
        </div>
       
        <div class="slider-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="slider-text-inner">
                            <img src="{{ asset('front/wollo.png') }}" style="margin-top:-5rem; "
                                width="500" />
                            <div class="sleider-heading">
                                <h1 onclick="openFullscreen();" style="color: #a1ff00">Wollo<br>University <br>
                                    <span style="color:#b2bfb2;">Student Cafe<br> CHECK
                                        POINT</span></h1>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" style="opacity:0" id="rec" type="text" autofocus>
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
        <div class="slider-hex-right" style="margin-top:-10rem">
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
