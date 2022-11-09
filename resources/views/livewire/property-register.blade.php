 
<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-5">
									<div class="card">
										<div class="card-body">
											<div class="text-center title-style mb-6">
												<h1 class="mb-2">Register</h1>
                                                @if($msg != null)

                                                <div class="alert alert-light-success" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>    {{ $msg }}</div>


                                                
                                                @endif
											</div>
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
								</div>
							</div>
						</div>
 
