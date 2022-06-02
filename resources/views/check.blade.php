<!DOCTYPE html>
<html>


<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KIOT-STUDENT-CAFE</title>

    <!-- Fav Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/fav-icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav-icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/fav-icons/favicon-16x16.png">


    <!-- Dependency Styles -->
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/bootstrap/css/bootstrap.min.css') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/fontawesome/css/fontawesome-all.min.css') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/slick-carousel/css/slick.css') }}" type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/slick-carousel/css/slick-theme.css') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/simplebar/css/simplebar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/dependencies/aos/css/aos.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('front/dependencies/vegas/css/vegas.min.css') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/malihu-custom-scrollbar-plugin/css/jquery.mCustomScrollbar.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('front/dependencies/venobox/css/venobox.css') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('front/dependencies/jQuery-Simple-MobileMenu/css/jquery-simple-mobilemenu.css') }}"
        type="text/css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/app.css') }}" type="text/css">

    <!-- San Fransisco Fonts -->
    <link href="{{ asset('front/dependencies/SanFrasiscoPro/css/stylesheet.css') }}"
        rel="stylesheet" type="text/css">


</head>

<body id="home-version-1" class="home-version-1" data-style="default" style="overflow:hidden"  >
    <style>
        input {
            border: none;
            position: relative;
            outline: none;
            width: 5px;
            height: 30p;
            color: transparent;
            text-shadow: 0 0 0 #fffff;
            margin: 0 auto;
            padding: 10px;

        }

        h1,
        h2,
        h3 {
            color: white;
        }

        .fa {
            width: 600px;
            display: block;
            text-align: center;

            font: normal 45px 'FontAwesome';
            line-height: 60px;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        .fa-angle-double-down:before {
            content: "\f107";
        }

        .bounce {
            position: absolute;

            left: 50%;

            margin-left: -30px;

            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
            animation: bounce 2s infinite;
            -webkit-animation: bounce 2s infinite;
            -moz-animation: bounce 2s infinite;
            -o-animation: bounce 2s infinite;
        }

        @-webkit-keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                -webkit-transform: translateY(0);
            }

            40% {
                -webkit-transform: translateY(-30px);
            }

            60% {
                -webkit-transform: translateY(-15px);
            }
        }

        @-moz-keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                -moz-transform: translateY(0);
            }

            40% {
                -moz-transform: translateY(-30px);
            }

            60% {
                -moz-transform: translateY(-15px);
            }
        }

        @-o-keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                -o-transform: translateY(0);
            }

            40% {
                -o-transform: translateY(-30px);
            }

            60% {
                -o-transform: translateY(-15px);
            }
        }

        <blade keyframes|%20bounce%20%7B%0D>0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        60% {
            transform: translateY(-15px);
        }
        }

        .imgs {
            display: inline-block
        }

        input[type=text]:focus {
            background-color: lightgoldenrodyellow;
        }

    </style>

    <div id="site"></div>
    <div id="conn" class="off-canvus-menu">
        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box display-flex">

            <div class="half-grid">
                <img id="ownerpic" src="front/placeholder.jpg" style=" width: 400px; height: 400px;" />
                {{-- <h2 style="font-size:40px; color: white;" id="staffName">Loading ...</h2>
                <h3 style="font-size:40px; color: white;" id="staffId">Loading ...</h3> --}}
            </div>

            <div class="half-grid desplay-flex" style="margin-top: 7rem; ">
                <br>
                {{-- <h2  style="font-size:48px; color: grey;">Status: <span style="font-size:48px; color: rgb(245, 245, 245);" id="name">Loading...</span></h2> --}}
                <h4 style=" color: rgb(255, 255, 255);">Name: <span style=" color: rgb(245, 245, 245);"
                        id="name">Loading...</span></h4>
                <h4 style=" color: rgb(255, 255, 255);">Id Number: <span style=" color: rgb(255, 238, 5);"
                        id="s_n">Loading...</span></h4>
                <div class="offcanvas-facilities-box">
                    <h4 style=" color: rgb(255, 255, 255);">Role: <span style=" color: rgb(245, 245, 245);"
                            id="Role">Loading...</span></h4>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer">
            <div class="imgs justify-between">
                {{-- <img id="img1" src="{{ asset('front/phd.jpg') }}"
                style="width: 280px; height: 210px;" />
                <img id="img2" src="{{ asset('front/phd.jpg') }}"
                    style="width: 280px; height: 210px;" />
                <img id="img3" src="{{ asset('front/phd.jpg') }}"
                    style="width: 280px; height: 210px;" /> --}}
                <h1 style="color: rgb(115, 204, 115)">SUCCESSFULLY ATTENDED</h1>
            </div>
            <div class="">
                <span>BGI-KOMBOLCHA</span>
            </div>
        </div>
    </div>


    <div id="conn2" class="off-canvus-menu">
        <a href="#" class="close-offcanvus">
            <img src="media/images/icon/cross.png" alt="">
        </a>
        <div class="offcanvas-box ">
            <div>
                <img id="ownerpic" src="idcard/den.png" />
                {{-- <h2 style="font-size:40px; color: white;" id="staffName">Loading ...</h2>
                <h3 style="font-size:40px; color: white;" id="staffId">Loading ...</h3> --}}
            </div>
            <div class="desplay-flex" style="margin-top: 7rem; ">
                <h1 style="color: rgb(240, 48, 0)">Unsuccessfull Trial!</h1>

            </div>


        </div>

        <div class="offcanvas-footer">

            <div class="">
                <h1></h1>
                <span>BGI-KOMBOLCHA</span>
            </div>
        </div>
    </div>



    <!--=========================-->
    <!--=      Slider Section    =-->
    <!--=========================-->

    <section class="slider-wrapper" style="width:100%; height:100%; overflow:hidden;" >

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
                            <img src="{{ asset('front/wollo.png') }}" style="margin-top:-5rem; " width="500" />
                            <div class="sleider-heading">
                                <h1 onclick="openFullscreen();" style="color: darkolivegreen">Wollo<br>University <br> 
                                <span>Student Cafe<br> CHECK
                                        POINT</span></h1>
                                        
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" id="rec" type="text" autofocus>
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
    <!-- /#site -->

    <!-- Dependency Scripts -->
    <script src="{{ asset('front/dependencies/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('front/dependencies/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/dependencies/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/app.js') }}"></script>


    <script type="text/javascript">
        function myTimer() {
            document.getElementById("rec").focus();
        }
        var myVar = setInterval(myTimer, 1000);

        //setup before functions
        var typingTimer; //timer identifier
        var doneTypingInterval = 300;
        var closeTime = 3000;

        //on keyup, start the countdown
        $('#rec').keyup(function () {
            clearTimeout(typingTimer);
            if ($('#rec').val()) {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
        });

        //qr is "finished being written," do other things
        function doneTyping() {
            inactivityTime();
            $('.off-canvus-menu').removeClass('open');
            $('.mask-overlay').remove();
            let inp = document.getElementById('rec');
            let valueOF = inp.value;
            //	console.log(valueOF);
             
            inp.value = null;

            var mask = '<div class="mask-overlay">';
            $('.off-canvus-menu').addClass('open');
            $(mask).hide().appendTo('body').fadeIn('fast');
            $('.mask-overlay, .close-offcanvus').on('click', function () {
                inp.focus();
                $('.off-canvus-menu').removeClass('open');
                $('.mask-overlay').remove();
            });

        }

        var inactivityTime = function () {
            var time;
            window.onload = resetTimer;
            // DOM Events
            document.onload = resetTimer;
            document.onmousemove = resetTimer;
            document.onmousedown = resetTimer;
            document.ontouchstart = resetTimer;
            document.onclick = resetTimer;
            document.onkeydown = resetTimer;

            function leave() {
                $('.off-canvus-menu').removeClass('open');
                $('.mask-overlay').remove();
            }

            function resetTimer() {
                clearTimeout(time);
                time = setTimeout(leave, 30000)
                // 1000 milliseconds = 1 second
            }
        };
        function openFullscreen() {
            var elem = document.documentElement;
             
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
    </script>
</body>


</html>
