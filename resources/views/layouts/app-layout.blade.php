@include('includes.header')

		 
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('back/assets/images/svgs/loader.svg')}}" alt="loader">
		</div>
		<!--- End Global-loader-->
		<!-- Page -->
		<div class="page">
			<div class="page-main">
				@include('includes.left-side-menu')
				<!--aside closed-->				<!-- App-Content -->
				<div class="app-content main-content">
					<div class="side-app">
						@include('includes.top-nav')			
				@yield('content')
				</div>
				</div>

				<!-- End app-content-->
			</div>
						<!--Footer-->
		@include('includes.footer')


			@if (count($errors) > 0)
				<script>
					$('#normalmodal').modal('show');	
				</script>
			@endif

			