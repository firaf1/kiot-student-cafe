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
                                        <th>Name</th>
                                       
                                        <th>Available</th>
                                        <th>Measurements</th>
                                        <th>Store Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody wire:poll>
                                <span class="bg-warning list-bar"></span>
                                    @foreach($items as $input) 
                                        <tr>
                                            @if($input->check($input->id))
                                                <td>{{ $input->name }}</td>
                                                <td> 
                                                    <span class="badge badge-primary-light ">{{ $input->inItems($input->id) }}
                                                        </span> 
                                                    </td>
                                              
                                                
                                                <td> 
                                                    <span class="badge badge-danger-light ">{{ $input->measurement->name }}
                                                        </span> 
                                                    </td>
                                               
                                                <td>
                                                     <span class="badge badge-primary"> {{ $input->status }}</span>
                                                    </td>
                                                <td> <span class="ml-2 text-success fs-13 font-weight-semibold">{{ $input->created_at->diffForHumans() }}</span></td>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex">
                                 
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
