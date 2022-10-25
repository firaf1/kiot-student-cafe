@extends('layouts.app-layout')
@section('content')
<div class="rowq">
<div class="side-app">
						<!--app header-->
						 
						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">User List 02</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-grid mr-2 fs-14"></i>Apps</a></li>
									<li class="breadcrumb-item"><a href="#">User List</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">User List 02</a></li>
								</ol>
							</div>
							<div class="page-rightheader">
								<div class="btn btn-list">
								<a href="{{ route('qr-generate') }}" class="btn btn-primary"><i class="fe fe-printer mr-1"></i> Card Generate  </a>
 									<a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
									<a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
								</div>
							</div>
						</div>
                        <!--End Page header-->
												<!-- Row -->
					@livewire('student-super-admin')
						<!-- End Row -->

					</div>


			<div class="modal fade show" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal"  aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<form action="{{ route('import-student') }} " method="post" enctype="multipart/form-data">
						<div class="modal-body">
								@csrf
								<input type="file" name="file" id="" class="form-control">
								 
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button  type="submit" class="btn btn-primary">Import Student</button>
							</div>
						</form>
					</div>
				</div>
			</div>
</div>
@endsection