<div>
    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12 mt-3">
            <div class="card">
                <div class="card-body p-6">
                    <div class="inbox-body" >
                    @if($items->count() == 0)
                        <div class="" wire:loading.remove>

                            <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:20hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">@lang('notDataFound')</h2>
                            </div>
                        @else
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

                        <div class="table-responsive" wire:poll>
                            <table class="table table-inbox table-hover text-nowrap mb-0">
                                <thead class="">
                                    <tr>
                                        <th>@lang('person')</th>
                                        <th>@lang('name')</th>
                                        <th>@lang('Measurements')</th>
                                        <th>@lang('amount')</th>

                                        <th>@lang('Store_Status')</th>

                                        <th>@lang('date')</th>
                                        <th>@lang('action')</th>

                                    </tr>
                                </thead>
                                <tbody >

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

                                              {{ $sche->inItems($sche->inputs_id) }} - @lang('items')
                                              </span>
                                              @elseif ($sche->inItems($sche->inputs_id)<=0)
                                              <span class="badge badge-danger  mt-2">
                                              <i class="fa fa-exclamation-triangle text-warning"> </i>

                                              @lang('outOFStore')
                                              </span>
                                              @else
                                              <span class="badge badge-warning  mt-2">
                                              <i class="fa fa-exclamation-triangle text-danger"></i>

                                              {{ $sche->inItems($sche->inputs_id) }} - @lang('items')
                                              </span>
                                              @endif
                                            </td>

                                            <td>{{ $sche->created_at->diffForHumans() }}</td>
                                            <td>

                                            <div class="dropdown">
														<button wire:click="approvedStore({{$sche->id }})" type="button" class="btn btn-primary " data-toggle="dropdown" aria-expanded="false">
															@lang('approved')
														</button>

													</div>


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

    <div class="modal show" id="signApproved" wire:ignore aria-modal="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">@lang('ApprovalSignature')</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
                    <div class="alert alert-light-danger" role="alert">
                   @lang('youAreResponsible') !!
                        </div>

 					<div class="form-group">
                        <input type="password" wire:model="password" placeholder="Password" class="form-control" name="" id=""> </div>
                        @if($passwordMessage != null)
                          <p class="text-danger"> {{ $passwordMessage }}  dd</p>
                        @endif
					</div>
					<div class="modal-footer">
						<button class="btn  btn-primary btn-block " wire:click="save()" wire:target="save" wire:loading.class="btn-loading py-4" type="button">
                              <span wire:loading.remove wire:target="save">
                                 @lang('save')
                             </span>
                            </button>

					</div>
				</div>
			</div>
		</div>
</div>
