<div>

    <div id="conn" class="off-canvus-menu" style="padding-left:10px; padding-right:10px; " wire:ignore.self>


        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box ">
            @if($status == 0)
                <img src="giphy.gif" style="width:50%; margin-left:20%;   " alt="" srcset="">
                <h2 style="text-align:center; color:red;">{{ $errorMessage }}</h2>
            @else
            <div class="row mb-4" >
                    <div class="col-5">
                    <img  class="student-image" wire:loading.remove src="{{ asset($student->image) }}"
                                                style=" width: 100%; height: 300px;" />
                    <img wire:loading   src="front/placeholder.jpg" style=" width: 100%; height: 300px;" />
                    </div>
                    <div class="col-7 ">
                        <table class="table table-striped ">
                                <thead>
                                    <tr>

                                        <th scope="col" style="color-black">
                                            <h4 style=" color: black;">Name    : </h4>
                                        </th>
                                        <th scope="col">
                                            <h6 wire:loading class="student-department">Loading...</h6>
                                            <h4 wire:loading.remove style=" color: black;">
                                                <span style=" color: rgb(255, 238, 5);" id="s_n">
                                                    
                                                        {{ $student->name }}
                                                    
                                                </span>
                                            </h4>
                                        </th>

                                    </tr>
                                    <tr>

                                        <th scope="col" style="color-black">
                                            <h4 style=" color: black;">ID Number    : </h4>
                                        </th>
                                        <th scope="col">
                                            <h6 wire:loading class="student-department">Loading...</h6>
                                            <h4 wire:loading.remove style=" color: black;">
                                                <span style=" color: rgb(255, 238, 5);" id="s_n">
                                                <button wire:loading.remove type="button" class="btn btn-primary">
                                                {{ $student->id_number }}
                                            </button>
                                                    
                                                    
                                                </span>
                                            </h4>
                                        </th>

                                    </tr>
                                    <tr>

                                        <th scope="col" style="color-black">
                                            <h4 style=" color: black;">Department: </h4>
                                        </th>
                                        <th scope="col">
                                            <h6 wire:loading class="student-department">Loading...</h6>
                                            <button wire:loading.remove type="button" class="btn btn-warning">
                                                {{ $student->department }}
                                            </button>
                                        </th>

                                    </tr>
                                     <tr>

                                        <th scope="col" style="color-black">
                                            <h4 style=" color: black;">Type: </h4>
                                        </th>
                                        <th scope="col">
                                            <h6 wire:loading class="student-department">Loading...</h6>
                                            <button wire:loading.remove type="button" class="btn btn-success">
                                                Regular
                                            </button>
                                        </th>

                                    </tr>
                                    
                                </thead>

                        </table>
                    </div>
                    <img style="margin-top:-2rem; margin-left:30%; width:40%; " wire:loading class="info-card_img-icon"
                            src="front/assets/img/loading.gif" alt="danger">

                          
                     
                        @if($student->status == 'Approved')
                                <div class="info-card info-card--success" wire:loading.remove style=" width:100%;">
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/success.svg" alt="success">
                                    </div>
                                    <div class="alert alert-success" style="width:100%; " role="alert">
                                        <h2 class="text-success">Successfull</h2>
                                    </div>
                                </div>
                                    @elseif($student->status == "Unapproved")  
                                    <div wire:loading.remove class="info-card info-card--danger" style=" width:100%;">
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/danger.svg" alt="success">
                                    </div>
                                    <div class="alert alert-danger" style="width:100%; " role="alert">
                                        <h2 class="text-danger">Account is Blocked</h2>
                                    </div>
                                </div>
                        @endif
                
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
                                    <span>Student <br> CHECK
                                        POINT</span></h1>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" style="opacity:0; " id="rec" type="text" autofocus>
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
