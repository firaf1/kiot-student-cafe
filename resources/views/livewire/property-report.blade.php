<div>
    <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <div class="form-group w-500 mt-2 ">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <i class="fe fe-search"></i>
                        </span>
                        <input type="text" wire:model="search" class="form-control" placeholder="Search..11.">
                    </div>
                </div>
                <div class="card-options">


                </div>
            </div>
            <div class="card-body">
                @if($propeties->count() == 0)
                <div class="" wire:loading.remove>
                    <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:20hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">@lang('notDataFound')</h2>
                            </div>
                            @else
                <div class="table-responsive" wire:poll >
                    <table class="table table-hover table-vcenter text-nowrap mb-0 table-striped   border-top">
                        <thead class="">
                            <tr>
                                <th>User info</th>
                                <th>Serial Number</th>
                                <th>Images</th>
                                <th>Date</th>
                                  <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($propeties as $pro)
                        <tr>
                                <td class="font-weight-bold">
                                    <div class=" ">
                                        <span class="bg-warning list-bar"></span>
                                        <div class="row align-items-center">
                                            <div class="col-9 col-sm-9">
                                                <div class="media mt-0">
                                                    <img src="{{ asset($pro->student->image) }}"
                                                        alt="img" class="w-7 h-7 rounded shadow mr-3">
                                                    <div class="media-body">
                                                        <div class="d-md-flex align-items-center mt-1">
                                                            <h6 class="mb-1">{{$pro->student->name}} </h6>
                                                        </div>
                                                        <span class="mb-0 fs-13 text-muted">
                                                            <span class="badge badge-danger-light ">
                                                                {{ $pro->student->department }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td><span class="badge badge-primary-light">{{ $pro->property->serial_number }}</span></td>
                                <td>
                                    <a data-toggle="modal" href="#modaldemo3">

                                        <img src="{{ asset($pro->property->firstImage) }}" onclick="imageZoom('{{ asset($pro->property->firstImage) }}',
                                        '{{ asset($pro->property->secondImage) }}',
                                        '{{ asset($pro->property->thirdImage) }}',
                                        '{{ $pro->property->serial_number }}'
                                        )"
                                                                alt="img" class="w-7 h-7 rounded shadow mr-3">
                                    </a>
                                </td>
                                 <td>
                                 <span class="badge badge-primary mt-2"> {{ $pro->created_at->diffForHumans() }}</span>

                                 </td>

                                <td class="align-middle">
                                    <div class="btn-group align-top">

                                        <button  wire:click="deletedId({{ $pro->id }})" class="btn btn-sm btn-danger"
                                            type="button"><i class="fe fe-trash-2"></i></button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade show" wire:ignore.self id="delete_shedule_modal" aria-modal="true">
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


    <div class="modal   show" id="modaldemo3"   aria-modal="true">
			<div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Preview</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body  " style=" ">
                    <div class="row">
                        <div class="col-sm-4">
                        <img id="myImg"   alt="" style="width:100%; height:16rem; box-shadow: 1px 5px 10px gray; border-radius:10px; ">
                        </div>
                        <div class="col-sm-4">
                        <img id="second"   alt="" style="width:100%; height:16rem; box-shadow: 1px 5px 10px gray; border-radius:10px; ">
                        </div>
                        <div class="col-sm-4">
                        <img id="third"   alt="" style="width:100%; height:16rem; box-shadow: 1px 5px 10px gray; border-radius:10px; ">
                        </div>
                        <h3 class="text-primary  m-4 text-center" id="serial"></h3>
                    </div>

					</div>

				</div>
			</div>
		</div>
        <script>
            function imageZoom(first, second, third, ser){
                document.getElementById("serial").innerHTML="Serial Number:     "+ser;
                document.getElementById("myImg").src = first;
                document.getElementById("second").src = second;
                document.getElementById("third").src = third;
                var el = document.getElementById("download");
                el.setAttribute("href", first);
	            el.setAttribute("download", first);

            }
        </script>
</div>
