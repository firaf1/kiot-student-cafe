<div>


    <div class="row "  >
        <div class="col-xl-12 col-lg-12 col-md-12 mt-3"  >
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
                <div class="card-body">
                    @if($users->count() == 0)
                        <div class="" wire:loading.remove style="height:10hv; overflow:hidden; ">

                            <img src="{{ asset('myData/no_data.gif') }} "
                                style="width:38%; height:10hv; margin-left:30%;  " alt="">
                            <h2 class="text-warning text-center">No Data found</h2>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-vcenter text-nowrap mb-0 table-striped   border-top">
                                <thead class="">
                                    <tr>
                                        <th>User info</th>
                                        <th>gender</th>
                                        <th>Role</th>
                                        <th>Roles</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td class="font-weight-bold">
                                                <div class=" ">
                                                    <span class="bg-warning list-bar"></span>
                                                    <div class="row align-items-center">
                                                        <div class="col-9 col-sm-9">
                                                            <div class="media mt-0">
                                                                <img src="{{ asset($user->image) }}" alt="img"
                                                                    class="w-7 h-7 rounded shadow mr-3">
                                                                <div class="media-body">
                                                                    <div class="d-md-flex align-items-center mt-1">
                                                                        <h6 class="mb-1">{{ $user->fname }}
                                                                            {{ $user->lname }} </h6>
                                                                    </div>
                                                                    <span
                                                                        class="mb-0 fs-13 text-muted">{{ $user->phone_number }}
                                                                        @if($user->status == 'Approved')
                                                                            <span class="badge badge-primary-light ">
                                                                            {{ $user->status }}
                                                                            </span>
                                                                            @else
                                                                            <span class="badge badge-danger-light ">
                                                                            {{ $user->status }}
                                                                            </span>
                                                                        @endif
                                                                         </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>

                                            <td><span class="badge badge-danger-light">{{ $user->gender }}</span></td>
                                            <td>
                                                @if($user->role == '1')
                                                <span class="badge badge-primary ">Super Admin</span>
                                                @elseif ($user->role == '2')
                                                <span class="badge badge-secondary ">Store Admin</span>
                                                @elseif ($user->role == '3')
                                                <span class="badge badge-warning ">Admin</span>
                                                @elseif ($user->role == '4')
                                                <span class="badge badge-primary ">Ticker</span>
                                            @endif
                                             </td>
                                            <td>
                                                @if($user->role == '3')
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                       @if($user->role_id != null)
                                                       {{ $user->role1->name }}
                                                       @else 
                                                       select role @endif
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        @foreach ($inputs as $input)
                                                        <a wire:click="RoleAsign({{ $user->id }}, {{ $input->id }})" class="dropdown-item" href="#">{{ $input->name }} 
                                                            
                                                        </a>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="number-font">
                                                @if($user->status == "Approved")
                                            <div class="form-group " wire:click="UnapprovedUser({{ $user->id }})">
                                                    <label class="custom-switch">

                                                        <input checked type="checkbox" name="custom-switch-checkbox3" class="custom-switch-input">
                                                        <span class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group align-top">
                                                    <button wire:click="editUser({{ $user->id }})" class="btn btn-sm btn-success" type="button"
                                                        data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                    <button wire:click="deleted_id({{ $user->id }})"
                                                        class="btn btn-sm btn-success" type="button"><i
                                                            class="fe fe-trash-2"></i></button>
                                                </div>
                                                @else 
                                                <div class="form-group " wire:click="ApprovedUser({{ $user->id }})">
                                                    <label class="custom-switch">

                                                        <input   type="checkbox" name="custom-switch-checkbox3" class="custom-switch-input">
                                                        <span class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group align-top">
                                                    <button wire:click="editUser({{ $user->id }})" class="btn btn-sm btn-success" type="button"
                                                        data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                    <button wire:click="deleted_id({{ $user->id }})"
                                                        class="btn btn-sm btn-success" type="button"><i
                                                            class="fe fe-trash-2"></i></button>
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


    <div class="modal fade show" wire:ignore.self id="addUser" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-modal="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header card-header">

                    <h5 class="modal-title" id="largemodal1">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                




                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">First Name <span class="text-red">*</span></label>
                                @error('firstName')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <input type="text" class="form-control @error('firstName')  is-invalid @enderror"
                                    wire:model.defer="firstName" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Last Name <span class="text-red">*</span></label>
                                @error('lastName')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                    <input type="text" class=" @error('lastName')  is-invalid @enderror form-control"
                                        wire:model.defer="lastName" placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 mb-0">
                        <div class="form-group">
                            <label class="form-label">Phone Number <span class="text-red">*</span></label>
                            @error('phoneNumber')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <input type="text" wire:model.defer="phoneNumber"
                                    class="form-control @error('phoneNumber')  is-invalid @enderror"
                                    placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Password <span class="text-red">*</span></label>
                                @error('password')<div
                                    class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                    <input type="password" wire:model.defer="password"
                                        class="form-control @error('password')  is-invalid @enderror "
                                        placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Confirm Password <span class="text-red">*</span></label>
                                @error('password_confirmation')<div
                                    class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror


                            <input type="password" wire:model.defer="password_confirmation"
                                class="form-control @error('password_confirmation')  is-invalid @enderror"
                                placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Gender <span class="text-red">*</span></label>
                            @error('gender')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <select wire:model.defer="gender" class="form-control custom-select select2" style="width:100%; ">
                                    <option value="0">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label class="form-label">Role <span class="text-red">*</span></label>
                            @error('role')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <select wire:model="role" class="  custom-select select2" style="width:100%; ">
                                    <option value="0">--Select--</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Store Admin</option>
                                    <option value="3">Admin</option>
                                     
                                </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click="AddUser()" class="btn btn-primary">Add User</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" wire:ignore.self id="editUser" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-modal="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header card-header">

                    <h5 class="modal-title" id="largemodal1">Updated User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">First Name <span class="text-red">*</span></label>
                                @error('editFirstName')
                                <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                                @enderror
                                <input type="text" class="form-control @error('editFirstName')  is-invalid @enderror"
                                    wire:model.defer="editFirstName" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Last Name <span class="text-red">*</span></label>
                                @error('editLastName')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                    <input type="text" class=" @error('editLastName')  is-invalid @enderror form-control"
                                        wire:model.defer="editLastName" placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 mb-0">
                        <div class="form-group">
                            <label class="form-label">Phone Number <span class="text-red">*</span></label>
                            @error('editPhoneNumber')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <input type="text" wire:model.defer="editPhoneNumber"
                                    class="form-control @error('editPhoneNumber')  is-invalid @enderror"
                                    placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Password <span class="text-red">*</span></label>
                                @error('password')<div
                                    class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                    <input type="password" wire:model.defer="password"
                                        class="form-control @error('password')  is-invalid @enderror "
                                        placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Confirm Password <span class="text-red">*</span></label>
                                @error('password_confirmation')<div
                                    class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror


                            <input type="password" wire:model.defer="password_confirmation"
                                class="form-control @error('password_confirmation')  is-invalid @enderror"
                                placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Gender <span class="text-red">*</span></label>
                            @error('editGender')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <select wire:model.defer="editGender" class="form-control custom-select select2">
                                    <option value="">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Role <span class="text-red">*</span></label>
                            @error('editRole')
                            <div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    {{ $message }}
                            </div>
                            @enderror
                                <select wire:model.defer="editRole" class="form-control custom-select select2">
                                    <option value="0">--Select--</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Store Admin</option>
                                    <option value="3">Admin</option>
                                   
                                </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click="UpdateUserInfo()" class="btn btn-primary">Update User</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade show" id="userDeleteModal" aria-modal="true">
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
 
</div>
