<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/forgot-password-3 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:58:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
        content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4" />

    <!-- Title -->
    <title>forget password</title>

    <!--Favicon -->
    <link rel="icon" href="back/assets/images/brand/favicon.ico" type="image/x-icon" />

    <!--Bootstrap css -->
    <link href="back/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="back/assets/css/style.css" rel="stylesheet" />
    <link href="back/assets/css/dark.css" rel="stylesheet" />
    <link href="back/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="back/assets/css/animated.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="back/assets/css/icons.css" rel="stylesheet" />


    <!-- Color Skin css -->
    <link id="theme" href="back/assets/colors/color1.css" rel="stylesheet" type="text/css" />
</head>

<body class="h-100vh page-style1">
    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4">
                                        <div class="card-body">
                                            <h1 class="mb-2">Forgot Password</h1>

                                            <hr class="divider my-6">
                                            @if (session()->has('message'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <h5 class="alert-heading d-flex align-items-center fw-bold mb-1">
                                                        Oooops! :)</h5>
                                                    <p class="mb-0"> {{ session()->get('message') }}
                                                    </p>
                                                </div>
                                            @endif
                                            <form action="{{ route('send-email-to-verify') }}" method="post">
                                                @csrf
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-mail"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" placeholder="Enetr Email" name="email"
                                                        type="text">
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="sumbit" class="btn btn-primary btn-block px-4"><i
                                                                class="fe fe-send"></i> Send</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                        <div class="text-center justify-content-center page-single-content">
                                            <div class="box">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <img src="back/assets/images/png/login.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery js-->
    <script src="back/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap4 js-->
    <script src="back/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="back/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Othercharts js-->
    <script src="back/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

    <!-- Circle-progress js-->
    <script src="back/assets/js/circle-progress.min.js"></script>

    <!-- Jquery-rating js-->
    <script src="back/assets/plugins/rating/jquery.rating-stars.js"></script>
    <!-- Custom js-->
    <script src="back/assets/js/custom.js"></script>
</body>

<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/forgot-password-3 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:58:27 GMT -->

</html>
