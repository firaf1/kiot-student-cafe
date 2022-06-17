<div>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Cafe Student Report</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-server mr-2 fs-14"></i>Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="index-2.html#">report</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="index-2.html#" class="btn btn-info"><i class="fe fe-settings mr-1"></i> General Settings </a>
                <a href="index-2.html#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
                <a href="index-2.html#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
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

                    @foreach($schedules as $schedule)
                        <a href="#" wire:click="ScheduleList({{ $schedule->id }})"
                            class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fe fe-codepen fs-18 mr-2"></i> {{ $schedule->title }}

                            <span class="ml-auto badge badge-success">@if( $schedule->TotalStudent($schedule->id) !=
                                0){{ $schedule->TotalStudent($schedule->id) }} @endif</span>
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
                                <a href="index-2.html#" class="option-dots" data-toggle="dropdown" aria-haspopup="true"
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
                                <table class="table table-inbox table-hover text-nowrap mb-0">
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr class="">
                                                <td class="inbox-small-cells w-7">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td class="inbox-small-cells w-4">
                                                    <i class="fa fa-star"></i></td>
                                                <td class="view-message dont-show font-weight-semibold">
                                                    <img class="avatat avatar-sm brround mr-2"
                                                        src="{{ asset($user->user->image) }}" alt="img">
                                                    {{ $user->user->name }}
                                                </td>
                                                <td class="view-message">{{ $user->user->department }}</td>
                                                <td class="view-message"><span class="badge badge-light badge-pill">
                                                        {{ $user->user->id_number }}</span></td>
                                                <td class="view-message text-center ">
                                                    <span
                                                        class="badge badge-primary-light mt-2">{{ $user->user->type }}</span>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        @else
                            <div class="" wire:loading.remove>

                                <img src="{{ asset('myData/no_data.gif') }} "
                                    style="width:38%; height:20hv; margin-left:30%;  " alt="">
                                <h2 class="text-warning text-center">No Data found</h2>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
