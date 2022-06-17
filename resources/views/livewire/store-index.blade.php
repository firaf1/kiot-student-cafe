<div>
    <div class="row mt-3">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top Product Sales Overview</h3>
                    <div class="card-options">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AddItemModal"
						>Add Item</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table table-hover table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                            <thead class="">
                                <tr>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Measurement</th>
                                    <th>Stock</th>
                                    <th>Amount</th>
                                    <th>Stock Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)

                                    <tr>
                                        <td class="font-weight-bold">
                                            {{ $item->input->name }}
                                        </td>
                                        <td>
                                            {{ $item->amount }}

                                        </td>
                                        <td>
                                            <span class="badge badge-success">
                                                {{ $item->input->measurement->name }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary">
                                                Approved
                                            </span>
                                        </td>
                                        <td class="number-font">$ 2,356</td>
                                        <td><i class="fa fa-check mr-1 text-success"></i> In Stock</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Add Modal  -->
	<div class="modal fade show" id="AddItemModal" tabindex="-1" role="dialog" aria-labelledby="normalmodal"   aria-modal="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="normalmodal1">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
						<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"> Measurements <span class="text-red">*</span></label>
                                        <select class="form-control  custom-select select2" wire:model.defer="editMeasurement">
                                            <option value="0">--select measurement--</option>
                                            @foreach ($inputs as $schedule)
                                            <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </div>
                                    @error('measurement')
                                <p class="text-danger">{{ $message }}</p>   
                               @enderror
                                </div>
						<div class="form-group">
							<input type="text" place class="form-control">
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
</div>
