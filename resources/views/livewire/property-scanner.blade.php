<div>

    <div id="conn" class="off-canvus-menu" style="padding-left:10px; padding-right:10px; " wire:ignore.self>


        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box display-flex">
            @if($status == 0)
                <img src="giphy.gif" style="width:50%; margin-left:20%;   " alt="" srcset="">
                <h2 style="text-align:center; color:red;">{{ $errorMessage }}</h2>
            @else
                 
                <div class="">
               

                    <div class="offcanvas-facilities-box" style="margin:0px; width:100%; ">
                        <img style="margin-left:25%; width:50%; height:50%;" wire:loading class="info-card_img-icon"
                            src="front/assets/img/loading.gif" alt="danger">
                            <div class="" wire:loading.remove>
                                
                                @if($properties->count() > 1) 
                                    <div class="row">
                                        <div class="box col-9" style="border-right:4px solid gray; ">
                                                @foreach ($properties as $property)
                                                    <div class="row" wire:loading.remove>
                                                        <div class="col-sm-4">
                                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->firstImage) }}"
                                                                style=" width: 100%; height: 150px;" />
                                                        
                                                            </div>
                                                            <div class="col-sm-4">
                                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->secondImage) }}"
                                                                style=" width: 100%; height: 150px;" />
                                                        
                                                            </div>
                                                            <div class="col-sm-4">
                                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->thirdImage) }}"
                                                                style=" width: 100%; height: 150px;" />
                                                        
                                                        </div>
                                                    </div>
                                                        <button wire:loading.remove type="button" style="width:100%; " class="btn btn-primary my-1">
                                                            Serial Number:  {{ $property->serial_number }}
                                                        </button>
                                                @endforeach
                                            </div>
                                            <div class="col-3 mt-4 ">
                                                <div  >

                                                <img class="student-image" wire:loading.remove src="{{ asset($student->image) }}"
                                                    style=" width: 100%; height: 280px;" />
                                                    <h4 class="student-name">
                                                    <span wire:loading.remove> {{ $student->name }} </span>
                                                    
                                                </h4>
                                                <h6 class="student-department">
                                                    <span wire:loading.remove id="name"> ID: {{ $student->id_number }} </span>
                                                    <span wire:loading> Loading... </span>
                                                </h6>
                                                <h6 class="student-department">
                                                    <span wire:loading.remove id="name"> {{ $student->department }} </span>
                                                    <span wire:loading> Loading... </span>
                                                </h6>
                                                
                                                <!-- <h4 style=" color: rgb(255, 255, 255);">Name: 
                                                <span style=" color: rgb(245, 245, 245);"   id="name"  wire:loading.remove> {{ $student->name }}   </span>
                                                <span wire:loading> Loading...</span> -->
                                                </h4>
                                                </div>
                                            </div>
                                    </div>
                                
                                    @else 
                                <div class="row mb-4">
                                    <div class="col-5">
                                    <img  class="student-image" wire:loading.remove src="{{ asset($student->image) }}"
                                                                style=" width: 100%; height: 300px;" />
                                    </div>
                                    <div class="col-7 mt-3">
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
                                                </thead>

                                        </table>
                                    </div>
                                </div>
                                @if($properties->count()==0)
                                @if ($proStatus == 1)
                                <div class="info-card info-card--danger" style="border-top: 3px solid gray" >
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/danger.svg" alt="danger">
                                    </div>
                                    <div class="alert alert-warning mt-2" role="alert">
                                      Account is Blocked !!
                                    </div>
 
                                </div>
                                @else
                                <div class="info-card info-card--danger" style="border-top: 3px solid gray" >
                                    <div class="info-card_icon" style="margin-top:-2rem; ">
                                        <img class="info-card_img-icon" src="front/assets/img/warning.svg" alt="danger">
                                    </div>
                                    <div class="alert alert-warning mt-2" role="alert">
                                       No Registered properties found
                                    </div>
 
                                </div>
                                @endif
                                
                                @else
                                @foreach ($properties as $property)
                                    <div class="row" wire:loading.remove>
                                        <div class="col-sm-4">
                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->firstImage) }}"
                                                style=" width: 100%; height: 240px;" />
                                        
                                            </div>
                                            <div class="col-sm-4">
                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->secondImage) }}"
                                                style=" width: 100%; height: 240px;" />
                                        
                                            </div>
                                            <div class="col-sm-4">
                                            <img  class="student-image" wire:loading.remove src="{{ asset($property->thirdImage) }}"
                                                style=" width: 100%; height: 240px;" />
                                        
                                        </div>
                                    </div>
                                        <button wire:loading.remove type="button" style="width:100%; " class="btn btn-primary my-1">
                                            Serial Number:  {{ $property->serial_number }}
                                        </button>
                                @endforeach
                                @endif
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
                                    <input class="form-control"style="opacity:0"  id="rec" type="text" autofocus>
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
