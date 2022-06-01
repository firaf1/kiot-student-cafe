@extends('layouts.app-layout')
@section('content')
<div class="container mt-3">
    <div class="row ">
<div class="col-lg-12 col-md-9">
    <form method="post" action="{{route('update_user',$editUser->id)}}" enctype="multipart/form-data">
    @csrf
        <div  class="card">
            <div class="card-header">
                <h3 class="card-title text-success">Add User</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <div class="form-group">
                            <input value="{{$editUser->first_name}}" type="text" class="form-control" id="name1" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <div class="form-group">
                            <input value="{{$editUser->last_name}}" type="text" class="form-control" id="name2" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <input type="email" name="email" value="{{$editUser->email}}" class="form-control" id="inputEmail5" placeholder="Email Address">
                </div>
                
                <div class="form-group ">
                    <input type="text" value="{{$editUser->username}}" name="username" class="form-control" id="address" placeholder="username">
                </div>
                <div class="form-group ">
                    <input type="text" class="form-control" value="{{$editUser->gender}}" name="gender" id="address" placeholder="Gender">
                </div>
                <div class="form-group ">
                    <input type="text" value="{{$editUser->phone_number}}"  class="form-control" name="phone_number" id="address" placeholder="phone number">
                </div>
                <div class="form-group">
			<input type="file" class="form-control" name="image" />
	    </div>
                <div class="form-footer mt-2">
                    <input type="submit" value="Update" class="btn btn-success "/>
                </div>
            </div>
             
        </div>
    </form>
							</div>
                            </div>
             </div>

                            @endsection