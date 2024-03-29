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
																Schedule List
															</span>
 														</div>
													</div>
												</div>
												<div class="col col-auto mb-4">
													<div class="btn-group hidden-phone">
                                                    
												</div>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap mb-0">
                                                <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            
                                            <th>For</th>
                                            <th>Status</th>
                                             
                                           
                                        </tr>
                                    </thead>
													<tbody>
													  
													 @foreach ($schedules as $sche)
                                                     <tr class="">
                                                          
                                                         <td class="inbox-small-cells w-4">
                                                             
                                                         @if($sche->status=="Approved")
                                                          <i class="fa fa-star text-warning"></i>
                                                           @else <i class="fa fa-star"></i>
                                                           @endif
                                                        </td>
                                                         <td class="view-message dont-show font-weight-semibold">
                                                             
                                                            {{ $sche->title }}
                                                         </td>
                                                         <td class="view-message">
															@if($sche->type == "inactive")
															<span class="badge badge-danger mt-2">{{ $sche->type }}</span>
															@else 
															<span class="badge badge-primary mt-2">{{ $sche->type }}</span>
															@endif
															</td>
                                                          
                                                         <td><span class="badge badge-gradient-info">    {{ $sche->is_for_both  }}</span></td>
                                                         <td class="view-message">
                                                         @if($sche->type =='active')
                                                <div class="form-group "
                                                    wire:click="StatusChangeUnapprove({{ $sche->id }})">
                                                    <label class="custom-switch">

                                                        <input type="checkbox" checked name="custom-switch-checkbox3"
                                                            class="custom-switch-input">
                                                        <span
                                                            class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-group "
                                                    wire:click="StatusChangeApprove({{ $sche->id }})">
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
										</div>
									</div>
								</div>
								 
							</div>
						</div>

                       


            
 
            
</div>
