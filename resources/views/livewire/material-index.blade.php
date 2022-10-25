<div>
    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body p-6">
                    <div class="inbox-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group w-200">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Search Tasks">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-auto mb-4">
                                <div class="btn-group hidden-phone">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Add New Input
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap mb-0">
                                <thead class="">
                                    <tr>

                                        <th>Name</th>
                                        <th>Measurements</th>
                                        <th>roles</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($schedules as $sche)
                                        <tr class="">

                                            <td>{{ $sche->name }}</td>
                                            <td>{{ $sche->measurement->name }}</td>
                                            <td>
                                                <div class="tags">

                                                 

 

 
                                                
                                                @foreach($sche->roles($sche->id) as $key => $value)
	<span class="tag tag-dark">
    {{ $sche->one_input($value) }}
    
		<a   wire:click=" delete_role({{ $value }}, {{ $sche->id }})" class="tag-addon">
            <i class="fe fe-x"></i></a>
	</span>
	 
    @endforeach 
</div>








                                               
                                               
                                            </td>
                                            <td>
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-success" type="button"
                                                        wire:click="editSchedule({{ $sche->id }})">Edit</button>
                                                    <button wire:click="deletedId({{ $sche->id }})" data-toggle
                                                        class="btn btn-sm p-2 btn-danger" type="button"><i
                                                            class="fe fe-trash-2"></i></button>
                                                </div>
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
                    <h5 class="modal-title" id="normalmodal1">Add Input</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">




                    <label class="mt-4 ">Name</label>
                    <input type="text" wire:model.defer="title" placeholder=" Name... " class="form-control @error('title')
                                    is-invalid
@enderror">
@error('title')
                                <p class=" text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group" wire:ignore>
                        <label class="form-label">Select Roles</label>
                        <select  multiple="multiple" wire:model.defer="multi"
                            class=" select2 select211" style="width:100%; " >
@foreach ($roles as $role)
    
<option value="{{ $role->id }}">{{ $role->name }}</option>
@endforeach
													 
                                                      </select>
                      
 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label"> Measurements <span class="text-red">*</span></label>
                            <select style="width:100%; "  class="form-control  custom-select select2" wire:model.defer="measurement">
                                <option value="0">--select measurement--</option>
                                @foreach($measurements as $schedule)
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
                    <button type="button" wire:click="AddSchedule" class="btn btn-primary">Add Input</button>
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
                    
                    <div class="form-group" >

                        <label class="form-label">Select Roles</label>
<div class="" wire:ignore>
                 <select  multiple="multiple" wire:model.defer="edited_multi"
                            class=" select2 select211222" style="width:100%; " >
@foreach ($roles as $role)
    
<option value="{{ $role->id }}">{{ $role->name }}</option>
@endforeach
													 
                                                      </select>
                                                      </div>
                                                      @if($edited_roles !=null)
                                                      <div class="tags">
                        @foreach($edited_roles as $key => $value)
	 
	 
	 
        <span class="tag tag-danger mt-1">
    mestengdo
    
	 
	</span>
	 
	 
	 
    
    @endforeach
</div>
 
@endif
 
                    </div>

     


                        <div class="form-group">
                            <label class="form-label"> Measurements <span class="text-red">*</span></label>
                            <select class="form-control  custom-select select2" wire:model.defer="editMeasurement">
                                <option value="0">--select items--</option>
                                @foreach($measurements as $schedule)
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
    @push('js')
<script>
	$(function() {
	 
$('.select211').select2({
  

}).on('change', function() {
	@this.set('multi', $(this).val());
    console.log('changing.......')
})

$('.select211222').select2({
  

}).on('change', function() {
	@this.set('edited_multi', $(this).val());
    console.log('changing.......')
})
    })
</script>
@endpush
</div>
