 
<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-5">
									<div class="card">
                                    <div class="card" id="tabs-style3">
									 
									<div class="card-body">
										<div class="panel panel-primary tabs-style-3"  >
											<div class="tab-menu-heading">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li class=""><a href="#tab11" id="t-1" class="active" data-toggle="tab"><i class="fe fe-airplay mr-1"></i>Register Your Property</a></li>
														<li><a href="#tab12" id="t-2" data-toggle="tab"><i class="fe fe-package mr-1"></i> Check Your Profile</a></li>
														 
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active" id="tab11">
                                                    <div class="card-bodya">
                                                        @if($msg != null)
                                                        <div class="text-center title-style mb-6">

                                                <div class="alert alert-light-success" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>    {{ $msg }}</div>


                                                
											</div>
                                                @endif
											<div class="row mb-3">
                                            @if ($first)
                                            <div class="col-sm-4">
                                            <img style="height:5rem; " src="{{ $first->temporaryUrl() }}">
                                            </div>
                                            @endif
                                            @if ($second)
                                            <div class="col-sm-4">
                                            <img style="height:5rem;width:100%;  " src="{{ $second->temporaryUrl() }}">
                                            </div>
                                            @endif
                                            @if ($third)
                                            <div class="col-sm-4">
                                            <img style="height:5rem; " src="{{ $third->temporaryUrl() }}">
                                            </div>
                                            @endif
												 </div>
										 
											<div class="input-group mb-4">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fe fe-user"></i>
													</div>
												</div>
												<input wire:model.defer="id_number" type="text" class="form-control @error('id_number')  is-invalid @enderror" placeholder="ID Number">
                                              
											</div>
                                            @error('id_number') <p class="text-danger" style="margin-top:-1rem;"> {{$message}} </p>@enderror
                                            <div class="input-group mb-4">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-laptop"></i>
													</div>
                                                  
												</div>
												<input wire:model.defer="serial_number"  type="text" class="form-control @error('serial_number')  is-invalid @enderror" placeholder="Serial Number">
											</div>
                                            @error('serial_number') <p class="text-danger" style="margin-top:-1rem;"> {{$message}} </p>@enderror
                                            <p>First Picture</p>
											<div class="input-group mb-4">
                                                <input wire:model="first" type="file" accept="image/*" class="form-control @error('first')  is-invalid @enderror" placeholder="Enetr Email">
											</div>
                                            @error('first') <p class="text-danger" style="margin-top:-1rem;"> {{$message}} </p>@enderror
                                            <p>Second Picture</p>
											<div class="input-group mb-4">
                                                <input wire:model="second" type="file" accept="image/*" class="form-control @error('second')  is-invalid @enderror" placeholder="Password">
											</div>
                                            @error('second') <p class="text-danger" style="margin-top:-1rem;"> {{$message}} </p>@enderror
                                            <p>Third Picture</p>
                                            <div class="input-group mb-4">
                                                <input wire:model="third" type="file" accept="image/*" class="form-control @error('third')  is-invalid @enderror" placeholder="Password">
											</div>
                                            @error('third') <p class="text-danger" style="margin-top:-1rem;"> {{$message}} </p>@enderror
											<div class="row">
												<div class="col-12">

                                                <button type="button" style="height:3rem; " wire:target="save" wire:loading.class="btn-loading" 
                                                wire:click="save()"
                                                class="btn  btn-primary btn-block px-4">
                                                <span wire:loading.remove>
                                                Register
                                                </span>

                                            </button>
 												</div>
											</div>
											 
										</div>
													</div>
													<div class="tab-pane" id="tab12">
                                                        @error('preview_id_numer')
                                                        <div class="alert alert-light-danger" role="alert">
                                                                        {{ $message }}
                                                    </div>
                                                        @enderror
                                                        @if ($user)
                                                        <div class="card box-widget widget-user">
									<div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{ asset($user->image) }}"></div>
									<div class="card-body text-center">
										<div class="pro-user">
											<h4 class="pro-user-username text-dark mb-1 font-weight-bold">{{ $user->name }}</h4>
											<h6 class="pro-user-desc text-muted">{{ $user->department }}</h6>
											<div class="wideget-user-rating">
												 
												<a href="#"><i class="fa fa-institution text-warning mr-1"></i></a> <span>0{{ $user->phone_number }}</span>
											</div>
											<a href="#" class="btn btn-primary  mt-3"><i class="fa fa-institution"></i> {{ $user->type }}</a>
											<a href="#" class="btn btn-success  mt-3"><i class="fa fa-rss"></i> {{ $user->reg_type }}</a>
										</div>
									</div>
									 
								</div>
                                                        @endif
                                                   
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Enter Your ID Number" wire:model.defer="preview_id_numer" class="form-control">
                                                    </div>
												 <button style="height:3rem; " wire:target="preview" wire:loading.class="btn-loading" 
                                                wire:click="preview()"
                                                class="btn  btn-primary btn-block px-4">
                                                <span wire:loading.remove>
                                                Preview
                                                </span>
                                                </button>
												</div>
											</div>
										</div>
									</div>
 		<!---Prism Pre code-->
		 
		<!---Prism Pre code-->
								</div>
										

									</div>
								</div>
							</div>
                         
						</div>
 
