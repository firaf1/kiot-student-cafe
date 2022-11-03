<div>
<div class="row">
							<div class="col-xl-3 col-lg-4">
								 
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Password</div>
									</div>
									<div class="card-body">
										<div class="text-center mb-5">
											<div class="widget-user-image">
                                            @if(Auth::user()->image == null)
                                                    @if(Auth::user()->gender == "Male")
                                                    <img src="{{ asset('male_user.jpg') }}" style="width:100%; height:100%; " alt="user-img" class="rounded-circle  " >
                                                    @elseif(Auth::user()->gender == "Female")
                                                    <img src="{{ asset('female_user.jpg') }}" alt="user-img" class="rounded-circle  " >
                                                @endif 
                                                @else 
                                                <img src="{{ asset($image) }}" style="width:100%; height:100%; " alt="user-img" class="rounded-circle  " >
                                                    @endif
												 
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Old Password</label>
											<input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" value="password">
                                            @error('password')
                                               <p class="text-danger"> {{ $message }}</p>
                                            @enderror
										</div>

										<div class="form-group">
											<label class="form-label" wire:model="password">New Password</label>
											<input type="password" wire:model="newPassword" class="form-control @error('newPassword') is-invalid @enderror" value="password">
                                            @error('newPassword')
                                               <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="password" wire:model="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" value="password">
                                            @error('password_confirmation')
                                               <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
									</div>
									<div class="card-footer text-right">
										<button type="button" wire:click="password_update()" 
                                        class="btn btn-primary">
                                        <span   wire:loading.remove wire:targer="password_update()" >
                                 Update
                             </span>
                             <span class="" wire:loading wire:targer="password_update()" >
                                
                             <div class="spinner-border text-light mx-4 " style="margin:0px; padding:0px; height:1rem; width:1rem; " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                             </span>
                            </button>

                            
										<a href="#" class="btn btn-danger">Cancle</a>
									</div>
								</div>
							</div>
                            
							<div class="col-xl-9 col-lg-8">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Profile</div>
									</div>
									<div class="card-body">
 										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">First Name</label>
													<input wire:model="fname" type="text" class="form-control" placeholder="First Name">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Last Name</label>
													<input type="text" wire:model="lname" class="form-control" placeholder="Last Name">
												</div>
											</div>
                                            <div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Profile Picture</label>
													<input type="file" wire:model="profilePicture" class="form-control" placeholder="Number">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Email address</label>
													<input wire:model="email" type="email" class="form-control" placeholder="Email">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Phone Number</label>
													<input wire:model="phone_number" type="number" class="form-control" placeholder="Phone Number">
												</div>
											</div>
											
											   
										</div>
										   
									</div>
									<div class="card-footer text-right">
										 
                                            
                                        <button type="button" wire:click="UpdateProfile()" class="btn btn-primary">
                        <span wire:loading.remove wire:targer="UpdateProfile()">
                            Update
                        </span>
                        <span class="" wire:loading wire:targer="UpdateProfile()">

                            <div class="spinner-border text-light mx-4 "
                                style="margin:0px; padding:0px; height:1rem; width:1rem; " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </button>
                                        
										<a href="#" class="btn btn-danger">Cancle</a>
									</div>
								</div>
							</div>
						</div>
</div>
