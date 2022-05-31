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
 									<a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
									<a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
								</div>
							</div>
						</div>
                        <!--End Page header-->
												<!-- Row -->
						<div class="row flex-lg-nowrap">
							<div class="col-12">
								<div class="row flex-lg-nowrap">
									<div class="col-12 mb-3">
										<div class="e-panel card">
											<div class="card-body">

												<div class="row">
													<div class="col-6 mb-4">

														<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
															<i class="fe fe-plus"></i> Add New User
														</a>
													</div>
													<div class="col-6 col-auto">
														<div class="form-group">
															<div class="input-icon">
																<span class="input-icon-addon">
																	<i class="fe fe-search"></i>
																</span>
																<input type="text" class="form-control" placeholder="Search User">
															</div>
														</div>
													</div>
												</div>
                                                
												<div class="row">

												 @foreach($students as $student)
													 
													<div class="col-lg-6">
														<div class="d-sm-flex align-items-center border p-3 mb-3 br-7">
															<div class="avatar avatar-lg brround d-block cover-image" data-image-src="back/assets/images/users/6.jpg" style="background: url(&quot;assets/images/users/6.jpg&quot;) center center;">
															</div>
															<div class="wrapper ml-sm-3  mt-4 mt-sm-0">
																<p class="mb-0 mt-1 text-dark font-weight-semibold">{{ $student->name }}</p>
																<small class="text-muted">{{ $student->id_number }}</small> 
                                                                <span class="badge badge-primary-light mt-2">Primary</span>

															</div>

															<div class="float-sm-right ml-auto mt-4 mt-sm-0">
																
                                                            <div class="btn-group mt-2 mb-2">
													<button type="button" class="btn btn-success">Approved</button>
													<button type="button" class="btn btn-success dropdown-toggle split-dropdown" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu" role="menu">
														<li class="dropdown-plus-title">
															Dropdown
															<b class="fa fa-angle-up"></b>
														</li>
														<li><a href="#">Action</a></li>
														<li><a href="#">Another action</a></li>
														<li><a href="#">Something else here</a></li>
														<li class="divider"></li>
														<li><a href="#">Separated link</a></li>
													</ul>
												</div>

                                                            
																<a href="#" class="btn btn-primary">View Profile</a>
															</div>
														</div>
													</div>

                                    @endforeach
                                                     
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
						<div class="modal-body">
							<form action="{{ route('import-student') }} " method="post" enctype="multipart/form-data">
								@csrf
								<input type="file" name="file" id="" class="form-control">
								<button type="submit" class="btn btn-primary">Import</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
</div>
@endsection