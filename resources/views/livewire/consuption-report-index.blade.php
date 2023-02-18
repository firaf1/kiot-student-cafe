<div>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Cafe Student Consumption Report</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-server mr-2 fs-14"></i>Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">report</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="#" wire:click="export()" class="btn btn-info"><i class="fe fe-settings mr-1"></i> Export Students </a>

            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 col-xl-3 col-lg-4">
            <div class="card">
                <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                    <div class="mt-4 mb-4 ml-4 mr-4 text-center">
                        <a href="#" class="btn btn-primary btn-block">Schedule List</a>
                    </div>
                    <a href="#" wire:click="ScheduleList(0)"
                            class="list-group-item list-group-item-action @if (0 == $changedSchedule)
                                active
                            @endif d-flex align-items-center">
                            <i class="fe fe-check-circle fs-18 mr-2"></i> All

                        </a>
                    @foreach($schedules as $schedule)
                        <a href="#" wire:click="ScheduleList({{ $schedule->id }})"
                            class="list-group-item list-group-item-action @if ($schedule->id == $changedSchedule)
                                active
                            @endif d-flex align-items-center">
                            <i class="fe fe-chevrons-right fs-18 mr-2"></i> {{ $schedule->title }}
 
                        </a>

                    @endforeach

                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-9">

            <div class="card">
                <div class="card-body p-6">

                    <div class="dimmer active " style="width:60%; margin-left:20%;  " wire:loading>
                        <div class="spinner4 ">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                    </div>

                    <div class="inbox-body" wire:loading.remove>
                        <div class="row">
                            <div class="col">
                                <div class="form-group w-200">
                                    <div class="input-icon">
                                        <p class="text-">Student List</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-options">
                                <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" wire:click="Changedate(1)" href="#">Today</a>
                                    <a class="dropdown-item" wire:click="Changedate(2)" href="#">This Week</a>
                                    <a class="dropdown-item" wire:click="Changedate(3)" href="#">This Month</a>

                                </div>
                            </div>
                        </div>

                        @if($users->count()>0)
                            <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap mb-0ss" >
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
 
                                        </tr>
                                    </thead>
													<tbody>

													 @foreach ($users as $con)
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
 
                                                     </tr>

                                                     @endforeach

													</tbody>
												</table>

                            </div>
                        @else
                            <div class="" wire:loading.remove>

                                <img src="{{ asset('myData/no_data.gif') }} "
                                    style="width:38%; height:20hv; margin-left:30%;  " alt="">
                                <h2 class="text-warning text-center">@lang('notDataFound')</h2>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
