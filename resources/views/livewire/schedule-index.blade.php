<div>
<div class="row">
							 
							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-body p-6">
										<div class="inbox-body">
											<div class="row">
												<div class="col">
													<div class="form-group w-200">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fe fe-search"></i>
															</span>
															<input type="text" class="form-control" placeholder="Search Tasks">
														</div>
													</div>
												</div>
												<div class="col col-auto mb-4">
													<div class="btn-group hidden-phone">
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Add New User
                                    </a>
												</div>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap mb-0">
                                                <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Starting time</th>
                                            <th>Ending Time</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                           
                                        </tr>
                                    </thead>
													<tbody>
													  
													 @foreach ($schedules as $sche)
                                                     <tr class="">
                                                          
                                                         <td class="inbox-small-cells w-4">
                                                             
                                                         @if($sche->status=="Approved")
                                                          <i class="fa fa-star text-warning"></i>
                                                           @else <i class="fa fa-star"></i>
                                                           @endif
                                                        </td>
                                                         <td class="view-message dont-show font-weight-semibold">
                                                             
                                                            {{ $sche->title }}
                                                         </td>
                                                         <td class="view-message">Type</td>
                                                         <td class="view-message"><span class="badge badge-light badge-pill"> {{ $sche->starting_time }} -hour</span></td>
                                                         <td class="view-message"><span class="badge badge-light badge-pill"> {{ $sche->ending_time }} -hour</span></td>
                                                         <td class="view-message">
                                                         @if($sche->status =='Approved')
                                                <div class="form-group "
                                                    wire:click="StatusChangeUnapprove({{ $sche->id }})">
                                                    <label class="custom-switch">

                                                        <input type="checkbox" checked name="custom-switch-checkbox3"
                                                            class="custom-switch-input">
                                                        <span
                                                            class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-group "
                                                    wire:click="StatusChangeApprove({{ $sche->id }})">
                                                    <label class="custom-switch">

                                                        <input type="checkbox" name="custom-switch-checkbox3"
                                                            class="custom-switch-input">
                                                        <span
                                                            class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            @endif
                                                        </td>
                                                         <td  >
                                                         <div class="btn-group align-top">
																			<button class="btn btn-sm btn-success" type="button" 
                                                                          wire:click="editSchedule({{ $sche->id}})">Edit</button>
																			<button wire:click="deletedId({{ $sche->id }})" data-toggle class="btn btn-sm p-2 btn-danger" type="button"><i class="fe fe-trash-2"></i></button>
																		</div>
                                                         </td>
                                                     </tr>
                                                         
                                                     @endforeach
													  
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>
								 
							</div>
						</div>

                        <!-- // Delete Modal  -->

                        <div class="modal fade show" id="delete_shedule_modal"  aria-modal="true">
			<div class="modal-dialog modal-dialog-centered text-center" role="document">
				<div class="modal-content tx-size-sm">
					<div class="modal-body text-center p-4">
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
						<i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
						<h4 class="text-danger">Warning: Are your sure want to delete?</h4>
						<p class="mg-b-20 mg-x-20">this schedule may not be available any more it deleted permanently  </p>
                        <button wire:click="delete" aria-label="Close" class="btn btn-danger pd-x-25" data-dismiss="modal" type="button">Continue</button>
					</div>
				</div>
			</div>
		</div>


            <div class="modal fade show" id="normalmodal" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="normalmodal"  aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Add Schedule</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
                            @if ($scheduleErrorMessage)
                                
                            <p class="text-danger">invalid schedule time please review your input</p>
                            @endif

							<form action="{{ route('import-student') }} " method="post" enctype="multipart/form-data">
								@csrf
                                <label class="mt-4 ">Title</label>
								<input type="text"  wire:model="title"placeholder=" Title " 
                                class="form-control @error('title')
                                    is-invalid
                                @enderror">
                               @error('title')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
                                <label class="mt-4 ">Starting Date</label>
                                <div class="d-flex">
											<div class="input-group wd-150">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
													</div><!-- input-group-text -->
												</div><!-- input-group-prepend -->
												<input wire:model="startingDate" class="form-control  @error('startingDate')  is-invalid
                                @enderror ui-timepicker-input" id="tp3" placeholder="Set time" type="text" autocomplete="off">
 											</div><!-- input-group -->
										</div>
                                        @error('startingDate') 
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
                                <label class="mt-4 ">Ending Date</label>
                              
                                <div class="d-flex">
											<div class="input-group wd-150">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
													</div><!-- input-group-text -->
												</div><!-- input-group-prepend -->
												<input wire:model="endingDate" class="form-control  @error('endingDate')
                                    is-invalid
                                @enderror ui-timepicker-input" id="tp3" placeholder="Set time" type="text" autocomplete="off">
 											</div><!-- input-group -->
										</div>
                                        @error('endingDate')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
 							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" wire:click="AddSchedule" class="btn btn-primary">Add Schedule</button>
						</div>
					</div>
				</div>
			</div>


<!-- Edit modal -->
 

            <div class="modal fade show" id="EditSchedule" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="normalmodal"  aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Add Schedule</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('import-student') }} " method="post" enctype="multipart/form-data">
								@csrf
                                <label class="mt-4 ">Title</label>
								<input type="text"  wire:model="editTitle" placeholder=" Title " 
                                class="form-control @error('editTitle')
                                    is-invalid
                                @enderror">
                               @error('title')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
                                <label class="mt-4 ">Starting Date</label>
                                <div class="d-flex">
											<div class="input-group wd-150">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
													</div><!-- input-group-text -->
												</div><!-- input-group-prepend -->
												<input wire:model="editStartDate" class="form-control  @error('editStartDate')  is-invalid
                                @enderror ui-timepicker-input" id="tp3" placeholder="Set time" type="text" autocomplete="off">
 											</div><!-- input-group -->
										</div>
                                        @error('editStartDate')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
                                <label class="mt-4 ">Ending Date</label>
                              
                                <div class="d-flex">
											<div class="input-group wd-150">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
													</div><!-- input-group-text -->
												</div><!-- input-group-prepend -->
												<input wire:model="editEndDate" class="form-control  @error('editEndDate')
                                    is-invalid
                                @enderror ui-timepicker-input" id="tp3" placeholder="Set time" type="text" autocomplete="off">
 											</div><!-- input-group -->
										</div>
                                        @error('editEndDate')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
 							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" wire:click="update_Schedule" class="btn btn-primary">Update Schedule</button>
						</div>
					</div>
				</div>
			</div>
            
</div>
