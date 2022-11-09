
<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:53:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

		<!-- Title -->
		<title>KIOT-STUDENT-CAFE</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('back/assets/images/brand/favicon.png')}}" type="image/x-icon"/>

		<!--Bootstrap css -->
		<link href="{{ asset('back/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{ asset('back/assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/dark.css')}}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ asset('back/assets/css/animated.css')}}" rel="stylesheet" />

		<!--Sidemenu css -->
       <link href="{{ asset('back/assets/css/sidemenu.css')}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{ asset('back/assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('back/assets/css/icons.css')}}" rel="stylesheet" />
					<!-- INTERNAL Notifications  Css -->
		<link href="{{ asset('back/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{ asset('back/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
		<!-- Simplebar css -->
		<link rel="stylesheet" href="{{ asset('back/assets/plugins/simplebar/css/simplebar.css')}}">

	    <!-- Color Skin css -->
		<link id="theme" href="{{ asset('back/assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>
		
		<!-- Switcher css -->
		<link rel="stylesheet" href="{{ asset('back/assets/switcher/css/switcher.css')}}">
		<link rel="stylesheet" href="{{ asset('back/assets/switcher/demo.css')}}">
		<link href="{{ asset('back/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
		<link href="{{ asset('back/assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
		<link href="{{ asset('back/assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('back/assets/plugins/multipleselect/multiple-select.css')}}">

<!-- INTERNAL Sumoselect css-->
<link rel="stylesheet" href="{{ asset('back/assets/plugins/sumoselect/sumoselect.css')}}">
<link rel="stylesheet" href="{{ asset('back/assets/plugins/multi/multi.min.css')}}">

@livewireStyles()
 
		</head>
 
	<body class="app sidebar-mini {{ Auth::user()->theme}}" id="my-body">
	 
	 
		<!-- Start Switcher -->