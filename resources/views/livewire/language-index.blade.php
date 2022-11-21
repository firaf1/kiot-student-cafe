<div>
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


</div>
