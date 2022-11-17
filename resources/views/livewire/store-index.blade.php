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
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Add New items
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if($isNotFound)
                        <div class="" wire:loading.remove>

                            <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:20hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">No Data found</h2>
                            </div>
                        @else
                       
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap mb-0">
                                <thead class="">
                                    <tr>
                                        <th>Person</th>
                                        <th>Name</th>
                                        <th>Items</th>
                                        <th>Amount</th>
                                        <th>Store Status</th>
                                        <th>Status</th>
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

                                              out of store
                                              </span>
                                            @elseif($sche->ItemsPercent($sche->inputs_id)<75)
                                            <span class="badge badge-success  mt-2">
                                             <i class="fa fa-check text-light"></i>

                                              {{ $sche->inItems($sche->inputs_id) }} - items
                                              </span>
                                              @elseif ($sche->inItems($sche->inputs_id)<=0)
                                              <span class="badge badge-danger  mt-2">
                                              <i class="fa fa-exclamation-triangle text-warning"> </i>

                                              out of store
                                              </span>
                                              @else
                                              <span class="badge badge-warning  mt-2">
                                              <i class="fa fa-exclamation-triangle text-danger"></i>

                                              {{ $sche->inItems($sche->inputs_id) }} - items
                                              </span>
                                              @endif
                                            </td>
                                            <td>
                                                @if($sche->status == 'Approved')
                                            <span class="badge badge-primary-light mt-2">Approved</span>
                                            @elseif ($sche->status == 'Pending')
                                            <span class="badge badge-success-light mt-2">Pending</span>
                                            @elseif ($sche->status == 'Unapproved')
                                            <span class="badge badge-danger-light mt-2">Unapproved</span>
                                            @endif
                                            </td>
                                            <td>{{ $sche->created_at->diffForHumans() }}</td>
                                            <td>
                                            @if($sche->status != 'Approved')
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-success" type="button"
                                                        wire:click="editSchedule({{ $sche->id }})">Edit</button>
                                                    <button wire:click="deletedId({{ $sche->id }})" data-toggle
                                                        class="btn btn-sm p-2 btn-danger" type="button"><i
                                                            class="fe fe-trash-2"></i></button>
                                                </div>
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

    <!-- // Delete Modal  -->

    <div class="modal fade show" id="delete_shedule_modal" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger">Warning: Are your sure want to delete?</h4>
                    <p class="mg-b-20 mg-x-20">this schedule may not be available any more it deleted permanently </p>
                    <button wire:click="delete" aria-label="Close" class="btn btn-danger pd-x-25" data-dismiss="modal"
                        type="button">Continue</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade show" id="normalmodal" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="normalmodal" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">Add Store</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">




                    <label class="mt-4 ">Amount</label>
                    <input type="text" wire:model.defer="amount" placeholder="Amount of items " class="form-control
                    @error('amount')
                                                        is-invalid
                    @enderror">

                    @error('amount')
                                <p class=" text-danger">{{ $message }}</p>
                    @enderror
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label"> Items <span class="text-red">*</span></label>
                            <select wire:model="measurement" class="SlectBox  form-control ">
                                <option>--select items--</option>
                                @foreach($allInputs as $schedule)

                                <!-- <option value="{{ $schedule->id }}" disabled>{{ $schedule->name }}</option> -->

                                    <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        @error('measurement')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="addItems" class="btn btn-primary">Add Input</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit modal -->


    <div class="modal fade show" id="EditSchedule" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="normalmodal" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">Update Input</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <label class="mt-4 ">Title</label>
                    <input type="text" wire:model="editTitle" placeholder=" Title " class="form-control @error('editTitle')
                                    is-invalid
                    @enderror">
                    @error('title')
                                <p class=" text-danger">{{ $message }}</p>
                    @enderror

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label"> Items <span class="text-red">*</span></label>
                            <select class="form-control  custom-select select2" wire:model.defer="editMeasurement">
                                <option value="0">--select items--</option>
                                @foreach($allInputs as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                @endforeach


                            </select>
                        </div>
                        @error('measurement')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="update_Schedule" class="btn btn-primary">Update Input</button>
                </div>
            </div>
        </div>
    </div>

</div>
