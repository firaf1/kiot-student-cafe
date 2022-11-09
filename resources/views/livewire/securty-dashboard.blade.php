<div>
  <div class="row" >
        <div class="col-md-12 col-lg-3">
            <div class="card text-white bg-success">
                <div class="card-header border-transparent">
                    <h3 class="card-title ">Pending Request</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x text-white "></i></a>
                    </div>
                </div>
                <div class="card-body">
                <h2 class="text-center mb-4">{{ $pending }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card text-white bg-primary">
                <div class="card-header border-transparent">
                    <h3 class="card-title ">Approved Request</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x text-white "></i></a>
                    </div>
                </div>
                <div class="card-body">
                <h2 class="text-center  mb-4">{{ $approved }}</h2>
                            </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card text-white bg-warning">
                <div class="card-header border-transparent">
                    <h3 class="card-title ">Unapproved Request</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x text-white "></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center  mb-4">{{ $unapproved }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card text-white bg-secondary">
                <div class="card-header border-transparent">
                    <h3 class="card-title ">total Report</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x text-white "></i></a>
                    </div>
                </div>
                <div class="card-body">
                <h2 class="text-center  mb-4">{{ $totalReport }}</h2>
                </div>
            </div>
        </div>
    </div>
    @livewire('property-report')
</div>
