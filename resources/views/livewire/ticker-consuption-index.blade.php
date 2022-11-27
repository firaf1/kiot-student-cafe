<div>
<div class="row">
<div wire:target="myMount" wire:loading class="ww"
        style="width:100%; height:100%; background:#060220de; position:fixed; top:0px; left:0px;
         z-index:999999">
        <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="284px" height="284px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<path fill="none" stroke="#ffffff" stroke-width="8" stroke-dasharray="42.76482137044271 42.76482137044271" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z" stroke-linecap="round" style="transform:scale(0.8);transform-origin:50px 50px">
  <animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="0.6711409395973155s" keyTimes="0;1" values="0;256.58892822265625"></animate>
</path>
</svg>
            <h3>please wait......</h3>
        </div>
    </div>
							<div  class="col-md-12 col-lg-12 col-xl-12">
                              
								<div class="card pb-5" style="overflow:hidden;">
									<div class="card-body p-6" >
										<div class="inbox-body">
											<div class="row" >
                                                <div class="col-9">
                                                    <a href="#" wire:click="myMount()" class="text-primary text">  <i class="fa fa-refresh" data-toggle="tooltip" title="" data-original-title="refresh"></i> </a>
                                               
                                                </div>

												<div class="col-3 col-auto mb-4">

													<div class="btn-group hidden-phone">
                                                  
												</div>
												</div>
											</div>
                                             
 											<div class="table-responsive" >

                                             <table class="table table-inbox table-hover text-nowrap mb-0" wire:poll>
                                                <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Amount</th>

                                            <th>@lang('items')</th>
											<th>@lang('schedule')</th>
                                            <th> @lang('Measurements') </th>
                                            <th>status</th>
                                            <th>@lang('date')</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
													<tbody>

													 @foreach ($consumptions as $con)
                                                     <tr class="">

                                                         <td class="inbox-small-cells w-4">

                                                        </td>
                                                         <td class="view-message dont-show font-weight-semibold">

                                                            {{ $con->users->fname }}
                                                         </td>
                                                         <td class="view-message">
                                                         {{ $con->amount }}
															</td>

                                                         <td class="view-message">
															
                                                         {{ $con->roles->name }}
                                                        </td>
                                                      <td>  <span class="badge badge-warning"> {{ $con->schedule->title }}</span> </td>
                                                    <td>

														<span class="badge badge-default">{{ $con->roles->measurement }}</span>  </td>
                                                        <td>
                                                            @if($con->status == "Pending")
                                                            <span class="badge badge-success">Pending</span>
                                                            @elseif($con->status == "Approved")
                                                            <span class="badge badge-primary">Approved</span>
                                                            @elseif($con->status == "Unpproved")
                                                            <span class="badge badge-primary">Approved</span>
                                                            @else <span class="badge badge-default">no Status</span>
                                                            @endif

                                                    </td>
														<td> {{ $con->created_at->diffForHumans() }} </td>

                                                         <td  >
                                                         <div class="btn-group mt-2 mb-2">
													<button type="button" class="btn  
                                                    @if ($con->status == 'Pending')
                                                    btn-success
                                                    @elseif ($con->status == 'Approved')
                                                    btn-primary
                                                    @elseif ($con->status == 'Unapproved')
                                                    btn-danger
                                                    @endif
                                                    dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														{{ $con->status }} <span class="caret"></span>
													</button>
													<ul class="dropdown-menu" role="menu" style="">
														 
														<li><a href="#" wire:click="StatusChange('Approved', {{ $con->id}})">Approved</a></li>
														<li><a wire:click="StatusChange('Unapproved', {{ $con->id}})" href="#">Unapproved</a></li>
														 
													</ul>
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
 

 


 

 

<!-- Edit modal -->


</div>
