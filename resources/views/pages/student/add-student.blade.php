@extends('layouts.app-layout')
@section('content')
<div class="rowq">
<div class="side-app">
						<!--app header-->
						 
						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Student List</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-grid mr-2 fs-14"></i>Apps</a></li>
									<li class="breadcrumb-item"><a href="#">User List</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Student List</a></li>
								</ol>
							</div>
							<div class="page-rightheader">
								<div class="btn btn-list">
								<a href="{{ route('qr-generate') }}" class="btn btn-primary"><i class="fe fe-printer mr-1"></i> Card Generate  </a>
 									 
								</div>
							</div>
						</div>
                        <!--End Page header-->
												<!-- Row -->
					@livewire('student-super-admin')
						<!-- End Row -->

					</div>


			

			
</div>
@endsection