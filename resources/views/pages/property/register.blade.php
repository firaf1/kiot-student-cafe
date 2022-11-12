
<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/register-1 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:58:27 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

		<!-- Title -->
		<title>KIOT-PROPERTIES-REGISTRATION</title>

		<!--Favicon -->
		<link rel="icon" href="back/assets/images/brand/favicon.ico" type="image/x-icon"/>

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
		<link id="theme" href="back/assets/colors/color1.css" rel="stylesheet" type="text/css"/>
			@livewireStyles()
</head>
	<body class="h-100vh bg-primary">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						@livewire('property-register')

					</div>
				</div>
			</div>
        </div>
		
		@livewireScripts()
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
		<script>
				Livewire.on('dddd', () => {
					document.getElementById('t-1').classList.remove("active");
					document.getElementById('t-2').classList.add("active");

					document.getElementById('tab11').classList.remove("active");
					document.getElementById('tab12').classList.add("active");


				})
		</script>
<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/register-1 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:58:27 GMT -->
</html>