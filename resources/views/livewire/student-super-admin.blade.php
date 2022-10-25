<div>
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="e-panel card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6 mb-4">

                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Add New Student
                                    </a>
                                </div>
                                <div class="col-6 col-auto">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fe fe-search"></i>
                                            </span>
                                            <input type="text" wire:model="search" class="form-control" placeholder="Search User">
                                        </div>
                                    </div>
                                </div>
                            </div>
@if($students->count() == 0)
<div class="" >

                                <img src="http://127.0.0.1:8000/myData/no_data.gif " style="width:38%; height:20hv; margin-left:30%;  " alt="">
                                <h2 class="text-warning text-center">No Data found</h2>
                            </div>
                          @else
                            <div class="table-responsive">
                                <table
                                    class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                                    <thead class="">
                                        <tr>
                                            <th>Student Info</th>
                                            <th>ID No.</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Card</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($students as $student)

                                            <tr class="mb-0">
                                                <td class="font-weight-bold">
                                                    <div class="media mt-0">
                                                        <img src="{{ asset($student->image) }}" alt="img"
                                                            class="avatar brround avatar-md mr-3">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center mt-1">
                                                                <h6 class="mb-1">{{ $student->name }}</h6>
                                                            </div>
                                                            <span
                                                                class="mb-0 fs-13 text-muted">{{ $student->department }}
                                                                <span
                                                                    class="ml-2 text-success fs-13 font-weight-semibold">Paid</span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-warning">{{ $student->id_number }}</span>
                                                </td>
                                                <td>@if ($student->type == "cafe")
                                                    <span class="badge badge-primary-light">{{ $student->type }} </span>
                                                @else
                                                    <span class="badge badge-danger-light">{{ $student->type }} </span>
                                        @endif</td>

                                        <td class="number-font">
                                        @if($student->status =='Approved')
                                        <span class="badge badge-success mt-2">{{ $student->status }}</span>
                                        @else 
                                        <span class="badge badge-danger mt-2">{{ $student->status }}</span>
                                        @endif
                                        </td>
                                        <td>
                                        <a class="modal-effect " onclick="imageZoom('{{ asset($student->meal_card) }}', '{{ asset($student->id_number) }}')"
                                         data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
                                         <img height="100rem" src="{{ asset($student->meal_card) }}" />
                                        </a>
                                        
                                        </td>
                                        <td>
                                            @if($student->status =='Approved')
                                                <div class="form-group "
                                                    wire:click="StatusChangeUnapprove({{ $student->id }})">
                                                    <label class="custom-switch">

                                                        <input type="checkbox" checked name="custom-switch-checkbox3"
                                                            class="custom-switch-input">
                                                        <span
                                                            class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-group "
                                                    wire:click="StatusChangeApprove({{ $student->id }})">
                                                    <label class="custom-switch">

                                                        <input type="checkbox" name="custom-switch-checkbox3"
                                                            class="custom-switch-input">
                                                        <span
                                                            class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            @endif

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
            </div>
        </div>
    </div>


    <div class="modal   show" id="modaldemo8"   aria-modal="true">
			<div class="modal-dialog  " role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Card Preview</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body  " style="background:#dddce1; ">
						 <img id="myImg"   alt="">
					</div>
					<div class="modal-footer">
						<a id="download"  href="#" class="btn btn-indigo" >Danwload</a> <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>
        <script>
            function imageZoom(name, id){
                document.getElementById("myImg").src = name;
                var el = document.getElementById("download");
                el.setAttribute("href", name);
	            el.setAttribute("download", name);
              
            }
        </script>
</div>
