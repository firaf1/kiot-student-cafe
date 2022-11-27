<div>
<div class="row">

							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-body p-6">
										<div class="inbox-body">
											<div class="row">

												<div class="col col-auto mb-4">
													<div class="btn-group hidden-phone">
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Add Role
                                    </a>
												</div>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap mb-0">
                                                <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Type</th>

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

                                                            {{ $sche->name }}
                                                         </td>
                                                         <td class="view-message">
															@if($sche->conCheck($sche->id))
														 <span class="badge badge-info p-1 mt-2"> {{ $sche->consu($sche->id) }} </span>
														 <span class="badge badge-warning mt-2">{{ $sche->consuM($sche->id) }}</span>
														 <div class="btn-group align-top">
																	<button data-toggle="modal" data-target="#modaldemo8112" class="btn btn-sm btn-success" type="button" wire:click="editCon({{ $sche->id }})">Edit</button>
																</div>
														 @else
																 <div class="btn-group align-top">
																	<button data-toggle="modal" data-target="#modaldemo811" class="btn btn-sm btn-primary" type="button" 
																	wire:click="addConsuption({{ $sche->id }})">Add</button>
																</div>
																@endif
															</td>

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


			<div class="modal effect-flip-vertical show" wire:ignore.self id="modaldemo8112"  aria-modal="true">
			<div class="modal-dialog  text-center" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Edit consumption</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="dimmer active" wire:loading  wire:target="editCon">
											<div class="spinner4">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div>
					<div class="modal-body" wire:loading.remove wire:target="editCon">
						
						<div class="form-group">
							<p  class="form-laebel"> @lang('Name') </p>
							<input wire:model="editConName" type="text" class="form-control  @error('editConName') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Name">
						</div>
						@error('editConName')
							
						<p class="text-danger"> {{ $message }} </p>
						@enderror
						<div class="forms-group">
							<p  class="form-labele"> @lang('Measurement') </p>
							<input type="text" wire:model="editconMeas" class="form-control @error('editconMeas') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Measurement">
						</div>
						@error('editconMeas')
							
						<p class="text-danger"> {{ $message }} </p>
						@enderror
					</div>

					<div class="modal-footer">
						<button class="btn btn-indigo" style="height:2.7rem; " wire:click="updatCon" type="button">
							<span wire:loading.remove wire:target="updatCon" >

								@lang('update') 
							</span>
							<div  wire:loading  wire:target="updatCon" class="spinner-border text-light mx-4 mb-1" style="heght:0.5rem; " role="status">
							<span class="sr-only">Loading...</span>
							</div>
					
					</button> <button style="height:3rem; " class="btn btn-secondary" data-dismiss="modal" type="button">@lang('Cancel')</button>
					</div>
				</div>
			</div>
		</div>



		<div class="modal effect-flip-vertical show" wire:ignore.self id="modaldemo811"  aria-modal="true">
			<div class="modal-dialog  text-center" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add consumption</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="dimmer active" wire:loading  wire:target="addConsuption">
											<div class="spinner4">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div>
					<div class="modal-body" wire:loading.remove wire:target="addConsuption">
						
						<div class="form-group">
							<p  class="form-laebel"> @lang('Name') </p>
							<input wire:model="conName" type="text" class="form-control  @error('conName') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Name">
						</div>
						@error('conName')
							
						<p class="text-danger"> {{ $message }} </p>
						@enderror
						<div class="forms-group">
							<p  class="form-labele"> @lang('Measurement') </p>
							<input type="text" wire:model="conMeasur" class="form-control @error('conMeasur') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Measurement">
						</div>
						@error('conMeasur')
							
						<p class="text-danger"> {{ $message }} </p>
						@enderror
					</div>

					<div class="modal-footer">
						<button class="btn btn-indigo" style="height:2.7rem; " wire:click="submitCon" type="button">
							<span wire:loading.remove wire:target="submitCon" >

								@lang('addNew') 
							</span>
							<div  wire:loading  wire:target="submitCon" class="spinner-border text-light mx-4 mb-1" style="heght:0.5rem; " role="status">
							<span class="sr-only">Loading...</span>
							</div>
					
					</button> <button style="height:3rem; " class="btn btn-secondary" data-dismiss="modal" type="button">@lang('Cancel')</button>
					</div>
				</div>
			</div>
		</div>






                        <!-- // Delete Modal  -->

                        <div class="modal fade show" wire:ignore.self id="delete_shedule_modal"  aria-modal="true">
			<div class="modal-dialog modal-dialog-centered text-center" role="document">
				<div class="modal-content tx-size-sm">
					<div class="modal-body text-center p-4">
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
						<i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
						<h4 class="text-danger">@lang('warningAreyoursurewanttodelete')</h4>
						<p class="mg-b-20 mg-x-20">this Role may not be available any more it deleted permanently  </p>
                        <button wire:click="delete" aria-label="Close" class="btn btn-danger pd-x-25" data-dismiss="modal" type="button">@lang('Continue')</button>
					</div>
				</div>
			</div>
		</div>


            <div class="modal fade show" id="normalmodal" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="normalmodal"  aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Add Role</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
                            @if ($scheduleErrorMessage)

							<div class="alert alert-light-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-frown-o mr-2" aria-hidden="true"></i>Oh snap!  {{ $scheduleErrorMessage }}.</div>
                            @endif


								@csrf
                                <label class="mt-4 ">Title</label>
								<input type="text"  wire:model="title"placeholder=" Title "
                                class="form-control @error('title')
                                    is-invalid
                                @enderror">
                               @error('title')
                                <p class="text-danger">{{ $message }}</p>
                               @enderror


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
							<button type="button" wire:click="AddSchedule" class="btn btn-primary">Add Role</button>
						</div>
					</div>
				</div>
			</div>


<!-- Edit modal -->


            <div class="modal fade show" id="EditSchedule" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="normalmodal"  aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Add Role</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">

                                <label class="mt-4 ">Title</label>
								<input type="text"  wire:model="editTitle" placeholder=" Title "
                                class="form-control @error('editTitle')
                                    is-invalid
                                @enderror">





						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
							<button type="button" wire:click="update_Schedule" class="btn btn-primary">Update Role</button>
						</div>
					</div>
				</div>
			</div>

</div>
