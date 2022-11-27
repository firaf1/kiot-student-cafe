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
                                        <i class="fe fe-plus"></i> Add Consumption
                                    </a>
												</div>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap mb-0" wire:poll>
                                                <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Amount</th>

                                            <th>@lang('items')</th>
											<th>@lang('schedule')</th>
                                            <th> @lang('Measurements') </th>
                                            <th>status</th>
                                            <th>@lang('date')</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
													<tbody>

													 @foreach ($consumptions as $con)
                                                     <tr class="">

                                                         <td class="inbox-small-cells w-4">

                                                        </td>
                                                         <td class="view-message dont-show font-weight-semibold">

                                                            {{ $con->users->fname }}
                                                         </td>
                                                         <td class="view-message">
                                                         {{ $con->amount }}
															</td>

                                                         <td class="view-message">
															
                                                         {{ $con->roles->name }}
                                                        </td>
                                                      <td>  <span class="badge badge-warning"> {{ $con->schedule->title }}</span> </td>
                                                    <td>

														<span class="badge badge-default">{{ $con->roles->measurement }}</span>  </td>
                                                        <td>
                                                            @if($con->status == "Pending")
                                                            <span class="badge badge-success">Pending</span>
                                                            @elseif($con->status == "Approved")
                                                            <span class="badge badge-primary">Approved</span>
                                                            @elseif($con->status == "Unpproved")
                                                            <span class="badge badge-primary">Approved</span>
                                                            @else <span class="badge badge-default">no Status</span>
                                                            @endif

                                                    </td>
														<td> {{ $con->created_at->diffForHumans() }} </td>

                                                         <td  >
														 @if($con->status == "Pending")
                                                         <div class="btn-group align-top">
																			<button  data-toggle="modal" data-target="#modaldemo8112" class="btn btn-sm btn-success" type="button"
                                                                          wire:click="editConsuption({{ $con->id}})">Edit</button>
																			<button wire:click="deletedId({{ $con->id }})" data-toggle class="btn btn-sm p-2 btn-danger" type="button"><i class="fe fe-trash-2"></i></button>
																		</div>
																		@endif
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
							<h5 class="modal-title" id="normalmodal1">Add Consuption</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
                            @if ($scheduleErrorMessage)

							<div class="alert alert-light-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-frown-o mr-2" aria-hidden="true"></i>Oh snap!  {{ $scheduleErrorMessage }}.</div>
                            @endif


								@csrf
                                <label class="mt-4 "> @lang('amount') </label>
								<input type="text"  wire:model="amount"placeholder=" Amount "
                                class="form-control @error('amount')
                                    is-invalid
                                @enderror">
                               @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                               @enderror
							   <label class="mt-4 "> @lang('Schedule') </label>
							   <select name="" wire:model="schedule" class="form-control" id="">
								@foreach ($schedules as $schedule)
									<option value="{{ $schedule->id }}">{{ $schedule->title }} </option>
								@endforeach)
							   </select>
							   @error('schedule')
                                <p class="text-danger">{{ $message }}</p>
                               @enderror

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
							<button type="button" style="height:2.7rem; " wire:click="AddSchedule" class="btn btn-primary">
                            <span wire:loading.remove wire:target="AddSchedule" >

Add Consuption
</span>
<div  wire:loading  wire:target="AddSchedule" class="spinner-border text-light mx-4 mb-1" style="heght:0.5rem; " role="status">
<span class="sr-only">Loading...</span>
</div>
                            </button>
						</div>
					</div>
				</div>
			</div>


<!-- Edit modal -->


<div class="modal effect-flip-vertical show" wire:ignore.self id="modaldemo8112"  aria-modal="true">
			<div class="modal-dialog  text-center" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Edit consumption</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="dimmer active" wire:loading  wire:target="editConsuption">
											<div class="spinner4">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div>
					<div class="modal-body" wire:loading.remove wire:target="editConsuption">

						<div class="form-group">
							<p  class="form-laebel"> @lang('amount') </p>
							<input wire:model="editAmount" type="text" class="form-control  @error('editAmount') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Name">
						</div>
						@error('editAmount')

						<p class="text-danger"> {{ $message }} </p>
						@enderror
						<label class="mt-4 "> @lang('Schedule') </label>
							   <select name="" wire:model="editSchedule" class="form-control" id="">
								@foreach ($schedules as $schedule)
									<option value="{{ $schedule->id }}">{{ $schedule->title }} </option>
								@endforeach)
							   </select>
							   @error('editSchedule')
                                <p class="text-danger">{{ $message }}</p>
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
</div>
