@extends('layouts.app-layout')
@section('content')



<div class="container mt-5">
    <div class="row justify-content-end">

        <a class="btn btn-success " href="{{url('add-user')}}">Add User</a>
    </div>

    <div class="row">
<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped card-table table-vcenter text-nowrap">
												<thead>
													<tr>
														<th>SL</th>
														<th>Profile</th>
														<th>Full Name</th>
														<th>Email</th>
														<th>Phone Number</th>
														<th>Gender</th>
														<th>Role</th>
														<th>username</th>
														<th col-span="2">Action</th>
                                                          
													</tr>
												</thead>
												<tbody>
                                                             
                                                     @foreach($users  as $key=>$user)
                                                      
													<tr>
														<td scope="row">{{$key+1}}</td>
                                                    

                                                            <td> <div style="width:100px;object-fit:contain"><img style="border-radius:50%;"  src="{{$user->image}}" alt=""></div></td>
                                                     
														<td>{{$user->first_name}}  {{$user->last_name}}</td>
														<td>{{$user->email}}</td>
														<td>{{$user->phone_number}}</td>
														<td>{{$user->gender}}</td>
														<td>{{$user->role}}</td>
														<td>{{$user->username}}</td>
														<td><a class="btn btn-primary" href="{{route('edit_user',$user->id)}}">Edit</a></td>
                                                        <td><a class="btn btn-danger" href="{{route('delete_user',$user->id)}}">Delete</a></td>

                                                   
                                                    </tr>
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
        
                                    </div>
                           </div>
                                    @endsection