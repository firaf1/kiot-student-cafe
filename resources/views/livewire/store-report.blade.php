<div>
    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
            <div class="card-header">
                    <div class="form-group w-500 mt-2 ">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <i class="fe fe-search"></i>
                            </span>
                            <input type="text" wire:model="search" class="form-control" placeholder="Search Users">
                        </div>
                    </div>
                    <div class="card-options">
                        <button class="btn btn-primary mx-10" data-toggle="modal" data-target="#addUser">Add New
                            User</button>

                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="inbox-body">
                         
                        @if($isNotFound)
                        <div class="" wire:loading.remove>

                            <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:20hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">No Data found</h2>
                            </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-hover table-vcenter text-nowrap mb-0 table-striped   border-top">
                                <thead class="">
                                    <tr>
                                        <th>Person</th>
                                        <th>Approved</th>
                                        <th>Name</th>
                                        <th>Measurements</th>
                                        <th>Amount</th>
                                        
                                        <th>Store Status</th>

                                        <th>Date</th>
                                         

                                    </tr>
                                </thead>
                                <tbody wire:poll>
                                <span class="bg-warning list-bar"></span>
                                    @foreach($items as $sche)
                                        <tr class="">
                                            
                                        <td> 
                                            {{ $sche->user->fname }}</td>
                                        <td>{{ $sche->approvedBy->fname }}</td>
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

                                            <td>{{ $sche->created_at->diffForHumans() }}</td>
                                             
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
