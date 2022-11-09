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

         

        .imgs {
            display: inline-block
        }

        input[type=text]:focus {
            background-color: lightgoldenrodyellow;
        }

    </style>
    @livewireStyles()
</head>

<body id="home-version-1" class="home-version-1" data-style="default" style="overflow:hidden">

    <div id="site"></div>

   @livewire('property-scanner')



    </div>
    <!-- /#site -->
    @livewireScripts()
    <script>
        Livewire.on('dangerNotification111', postId => {
       
        var audio = new Audio('danger-alarm.mp3');
audio.play();

})

</script>
        <!-- Dependency Scripts -->
        <script src="{{ asset('front/dependencies/popper.js/popper.min.js') }}"></script>
        <script src="{{ asset('front/dependencies/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('front/dependencies/bootstrap/js/bootstrap.min.js') }}">
        </script>
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
                Livewire.emit('postAdded',valueOF )
                 
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
                } else if (elem.webkitRequestFullscreen) {
                    /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE11 */
                    elem.msRequestFullscreen();
                }
            }

        </script>
</body>


</html>
