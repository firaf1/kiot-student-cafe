<div>
    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body p-6">
                    <div class="inbox-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group w-500">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="text" wire:model="search" class="form-control"" placeholder="Search Items">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-auto mb-4">
                                <div class="btn-group hidden-phone">

                                </div>
                            </div>
                        </div>
                        @if($isNotFound)
                        <div class="" wire:loading.remove>

                            <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:20hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">@lang('notDataFound')</h2>
                            </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap mb-0">
                                <thead class="">
                                    <tr>
                                        <th>Person</th>
                                        <th>Name</th>
                                        <th>Measurements</th>
                                        <th>Amount</th>
                                        <th>Store Status</th>

                                        <th>Date</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody wire:poll>

                                    @foreach($items as $sche)
                                        <tr class="">
                                        <td>{{ $sche->user->fname }}</td>
                                            <td>{{ $sche->input->name }}</td>

                                            <td>
                                                <span class="badge badge-info  mt-2">
                                                    {{ $sche->input->measurement->name }}
                                                </span>
                                            </td>
                                            <td>{{ $sche->amount }}</td>
                                            <td>
                                                @if($sche->inItems($sche->inputs_id)==0)
                                                <span class="badge badge-danger  mt-2">
                                              <i class="fa fa-exclamation-triangle text-warning"> </i>

                                              @lang('outOFStore')
                                              </span>
                                            @elseif($sche->ItemsPercent($sche->inputs_id)<75)
                                            <span class="badge badge-success  mt-2">
                                             <i class="fa fa-check text-light"></i>

                                              {{ $sche->inItems($sche->inputs_id) }} - items
                                              </span>
                                              @elseif ($sche->inItems($sche->inputs_id)<=0)
                                              <span class="badge badge-danger  mt-2">
                                              <i class="fa fa-exclamation-triangle text-warning"> </i>

                                              @lang('outOFStore')
                                              </span>
                                              @else
                                              <span class="badge badge-warning  mt-2">
                                              <i class="fa fa-exclamation-triangle text-danger"></i>

                                              {{ $sche->inItems($sche->inputs_id) }} - items
                                              </span>
                                              @endif
                                            </td>

                                            <td>{{ $sche->updated_at->diffforHumans() }}</td>
                                            <td>
                                                @if($sche->status == "Approved" && $sche->CheckHour($sche->updated_at)>0)
                                                                <button class="btn-info btn" disabled>Approved</button>
                                                @else
                                                 @if($sche->status == 'Unapproved')
                                            <div class="dropdown">
														<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
															Unapproved
														</button>
														<div class="dropdown-menu" style="">
															<a class="dropdown-item" wire:click="approvedStore({{$sche->id }})" href="javascript:void(0)">Approved</a>
															<a class="dropdown-item" wire:click="UnapprovedStore({{$sche->id }})" href="javascript:void(0)">Unapproved</a>
														</div>
													</div>
                                            @elseif($sche->status == "Approved")
                                            <div class="dropdown">
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Approved
														</button>
														<div class="dropdown-menu" style="">
															<a class="dropdown-item" wire:click="approvedStore({{$sche->id }})" href="javascript:void(0)">Approved</a>
															<a class="dropdown-item"  wire:click="UnapprovedStore({{$sche->id }})" href="javascript:void(0)">Unapproved</a>
														</div>
													</div>
                                                    @elseif ($sche->status == "Pending")
                                                    <div class="dropdown">
														<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Pending
														</button>
														<div class="dropdown-menu" style="">
															<a class="dropdown-item" wire:click="approvedStore({{$sche->id }})" href="javascript:void(0)">Approved</a>
															<a class="dropdown-item" wire:click="UnapprovedStore({{$sche->id }})" href="javascript:void(0)">Unapproved</a>
														</div>
													</div>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex">
                                <div class="mr-auto p-2">showing {{ $items->count() }} of {{ $totalItems }} entries
                                </div>
                                @if($searchItems== null)
                                    <div class="p-2">{{ $items->links() }}</div>
                                @endif
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
