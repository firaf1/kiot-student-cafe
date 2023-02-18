<div>
    <div wire:target="qrGenerete,myMount, file, submitForm, generateForOneStudent" wire:loading class=""
        style="width:100%; height:100%; background:#060220de; position:fixed; top:0px; left:0px;
         z-index:999999">
        <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="284px" height="284px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<path fill="none" stroke="#ffffff" stroke-width="8" stroke-dasharray="42.76482137044271 42.76482137044271" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z" stroke-linecap="round" style="transform:scale(0.8);transform-origin:50px 50px">
  <animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="0.6711409395973155s" keyTimes="0;1" values="0;256.58892822265625"></animate>
</path>
</svg>
        </div>
    </div>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Student List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-grid mr-2 fs-14"></i>Apps</a></li>
                <li class="breadcrumb-item"><a href="#">User List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Student List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="#" wire:click="qrGenerete()" class="btn btn-primary"><i class="fe fe-printer mr-1"></i>
                    Card Generate </a>

            </div>
        </div>
    </div>
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="e-panel card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-3 mb-4">

                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#normalmodal">
                                        <i class="fe fe-plus"></i> Import Student
                                    </a>
                                   
                                </div>
                                <div class="col-3"> <a href="#" wire:click="myMount()" class="text-primary text">  <i class="fa fa-refresh" data-toggle="tooltip" title="" data-original-title="refresh"></i> </a></div>
                                <div class="col-6 col-auto">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fe fe-search"></i>
                                            </span>
                                            <input type="text" wire:model="search" class="form-control"
                                                placeholder="Search Student">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($students->count() == 0)
                                <div class="">

                                    <img src="{{asset('myData/no_data.gif') }}"
                                        style="width:38%; height:20hv; margin-left:30%;  " alt="">
                                    <h2 class="text-warning text-center">@lang('notDataFound')</h2>
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
                                                <th>Generate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($students as $student)
                                                <tr class="mb-0">
                                                    <td class="font-weight-bold">
                                                        <div class="media mt-0">
                                                            @if (file_exists($student->image))
                                                                <img src="{{ asset($student->image) }}" alt="img"
                                                                    class="avatar brround avatar-md mr-3">
                                                            @else
                                                                <img src="{{ asset('front/placeholder.jpg') }}"
                                                                    alt="img"
                                                                    class="avatar brround avatar-md mr-3">
                                                            @endif

                                                            <div class="media-body">
                                                                <div class="d-md-flex align-items-center mt-1">
                                                                    <h6 class="mb-1">{{ $student->name }}</h6>
                                                                </div>
                                                                @if ($student->reg_type == 'Regular')
                                                                    <span
                                                                        class="mb-0 fs-13 text-muted">{{ $student->department }}
                                                                        <span class="badge badge-primary">Regular</span>
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="mb-0 fs-13 text-muted">{{ $student->department }}
                                                                        <span
                                                                            class="badge badge-secondary">{{ $student->reg_type }}</span>
                                                                    </span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            class="badge badge-warning">{{ $student->id_number }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($student->type == 'cafe')
                                                            <span class="badge badge-primary-light">{{ $student->type }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger-light">{{ $student->type }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td class="number-font">
                                                        @if ($student->status == 'Approved')
                                                            <span
                                                                class="badge badge-success mt-2">{{ $student->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-danger mt-2">{{ $student->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="modal-effect "
                                                            onclick="imageZoom('{{ asset($student->meal_card) }}', '{{ asset($student->id_number) }}')"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#modaldemo8">
                                                            <img height="100rem"
                                                                src="{{ asset($student->meal_card) }}" />
                                                        </a>

                                                    </td>
                                                    <td>
                                                        @if ($student->qr == null)
                                                            <button class="btn btn-primary"
                                                                wire:click="generateForOneStudent({{ $student->id }} )">
                                                                Generate
                                                            </button>
                                                        @else
                                                            <button class="btn btn-danger"
                                                                wire:click="ReGenerate({{ $student->id }} )">
                                                                Re-Generate
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($student->status == 'Approved')
                                                            <div class="form-group "
                                                                wire:click="StatusChangeUnapprove({{ $student->id }})">
                                                                <label class="custom-switch">

                                                                    <input type="checkbox" checked
                                                                        name="custom-switch-checkbox3"
                                                                        class="custom-switch-input">
                                                                    <span
                                                                        class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                                </label>
                                                            </div>
                                                        @else
                                                            <div class="form-group "
                                                                wire:click="StatusChangeApprove({{ $student->id }})">
                                                                <label class="custom-switch">

                                                                    <input type="checkbox"
                                                                        name="custom-switch-checkbox3"
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


    <!-- // Delete Modal  -->

    <div class="modal fade show" id="delete_shedule_modal" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                    <i class="fe fe-alert-circle fs-100 text-warning lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-warning">Warning: Are your sure want Regenare a card?</h4>
                    <p class="mg-b-20 mg-x-20"> This card cann't be used any more it generate new card </p>
                    <button wire:click="GenerateAgain()" aria-label="Close" class="btn btn-danger pd-x-25"
                        data-dismiss="modal" type="button">@lang('Continue')</button>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade show" wire:ignore.self id="normalmodal" tabindex="-1" role="dialog"
        aria-labelledby="normalmodal" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">Import Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    @if (count($errors) > 0)


                        @foreach ($errors->all() as $error)
                            <div class="alert alert-light-secondary" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach

                    @endif

                    <input type="file" wire:model="file" id="" class="form-control">
                    @error('file')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" wire:loading.remove class="btn btn-primary"
                        wire:click="submitForm()">Import Student</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal   show" id="modaldemo8" aria-modal="true">
        <div class="modal-dialog  " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Card Preview</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body  " style="background:#dddce1; ">
                    <img id="myImg" alt="">
                </div>
                <div class="modal-footer">
                    <a id="download" href="#" class="btn btn-indigo">Download</a> <button
                        class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function imageZoom(name, id) {
            document.getElementById("myImg").src = name;
            var el = document.getElementById("download");
            el.setAttribute("href", name);
            el.setAttribute("download", name);
        }
    </script>
</div>
