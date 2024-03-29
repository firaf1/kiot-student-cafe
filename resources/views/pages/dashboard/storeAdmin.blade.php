@extends('layouts.app-layout')
@section('content')


<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">@lang('welcome')</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html#"><i class="fe fe-home mr-2 fs-14"></i>@lang('Home')</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('storeDashboard') }}">@lang('Store') @lang('Dashboard')</a></li>
        </ol>
    </div>
    
</div>
<!--End Page header-->

<!-- Row-1 -->
<div class="row">


    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card bg-secondary">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h6 class="text-white">@lang('pending')</h6>
                        <h2 class="text-white m-0 font-weight-bold">{{ $pending }}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fa fa-send fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h6 class="text-white">@lang('approved')</h6>
                        <h2 class="text-white m-0 font-weight-bold">{{ $approved }}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fa fa-check-square-o fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h6 class="text-white">@lang('UnapprovedStore')</h6>
                        <h2 class="text-white m-0 font-weight-bold">{{ $unapproved }}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fa fa-check-square-o fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h6 class="text-white">@lang('Total')</h6>
                        <h2 class="text-white m-0 font-weight-bold">{{ $itemAddedByYou }}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fa fa-users fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row-1 -->

<!-- Row-2 -->

<!-- End Row-2 -->

<!-- Row-3 -->
<div class="row">

    <div class="col-xl-4  col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Store and input Status')</h3>
                 
            </div>
            <div class="card-body">
                <div class="country-card">
                    @foreach($inputs as $input)
                        @if($input->check($input->id))
                            <div class="mb-5">
                                <div class="d-flex">
                                    <span class=""> <i class=" fa fa-institution text-primary" data-toggle="tooltip"
                                            title="" data-original-title="fa fa-institution"></i>
                                        {{ $input->name }}</span>
                                    <div class="ml-auto">
                                        <span class="text-success mr-1"><i class="fe fe-trending-up"></i></span>
                                        <span class="number-font">{{ $input->totalIn($input->id) }}%</span>
                                        ( {{ $input->inItems($input->id) }} )
                                    </div>
                                </div>
                                <div class="progress h-2  mt-1">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style=" <?php echo 'width:' . $input->totalIn($input->id) . '%'; ?>"></div>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach



                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Recent Activity')</h3>
                 
            </div>
            <div class="card-body">
                <div class="latest-timeline scrollbar3" id="scrollbar3" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <ul class="timeline mb-0">
                                            @foreach($stores as $store)
                                                <li class="mt-0">
                                                    <div class="d-flex">


                                                        <span class="badge badge-danger-light ">
                                                            {{ $store->amount }} -
                                                            {{ $store->input->measurement->name }}
                                                        </span>
                                                       
                                                            @if($store->type == 'in')
                                                            <span class="badge badge-primary ml-2">
                                                                @lang('out')
                                                            </span>
                                                            @elseif ($store->type == 'out')
                                                            <span class="badge badge-warning ml-2">
                                                               @lang('out')
                                                            </span>
                                                        @endif


                                                        <span class="ml-auto text-muted fs-11">
                                                            {{ $store->created_at->diffForHumans()}}
                                                         </span>
                                                    </div>
                                                    <p class="text-muted fs-12"><span class="text-info">{{$store->user->fname}}</span> 
                                                    @if($store->type == 'in')
                                                   @lang('added') {{ $store->amount }} {{ $store->input->name }} {{ $store->input->measurement->name }} @lang('intoStore')
                                                    @elseif ($store->type == 'out')
                                                    {{ $store->amount }}  {{ $store->input->name }} {{ $store->input->measurement->name }} @lang('outfromthestore') 
                                                    @endif
                                                     
                                                        </p>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 554px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar"
                            style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 227px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4  col-md-12">
          
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <p class=" mb-1 fs-14"> @lang('Cost Out Request')</p>
                        <h2 class="mb-0"><span class="number-font1">{{ $taken }}</span>
                        <span class="ml-2 text-muted fs-11"><span class="text-success">@lang('thisMonthByYourPermission')</span> </span></h2>
                    </div>
                    <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns">
                        <i class="las la-thumbs-up"></i></span>
                </div>
                <div class="d-flex mt-4">
                    
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <p class=" mb-1 fs-14"> @lang('Deleted Request') </p>
                        <h2 class="mb-0"><span class="number-font1">{{ $deleted }}</span>
                        <span class="ml-2 text-muted fs-11"><span class="text-success">@lang('thisMonthByYourPermission')</span> </span></h2>
                    </div>
                    <span class="text-danger fs-35 bg-danger-transparent border-danger dash1-iocns">
                    <i class="fa fa-trash"></i></span>
                </div>
                <div class="d-flex mt-4">
                    
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- End Row-3 -->

<!--Row-->
 
<!--End row-->



@endsection
