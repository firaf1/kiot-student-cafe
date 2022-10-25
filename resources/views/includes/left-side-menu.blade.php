<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="/">
            <img src="{{ asset('front/wollo.png') }}"
                style="width:100%; margin-top:-10px;  height:150%;" class="header-brand-img desktop-lgo"
                alt="Admintro logo">
            <img src="{{ asset('front/wollo.png') }}" class="header-brand-img dark-logo"
                alt="Admintro logo">
            <img src="{{ asset('front/wollo2.png') }}" class="header-brand-img mobile-logo"
                alt="Admintro logo">
            <img src="{{ asset('front/wollo2.png') }}" class="header-brand-img darkmobile-logo"
                alt="Admintro logo">
        </a>
    </div>

    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="back/assets/images/users/2.jpg" alt="user-img" class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1">Jessica <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">Web Designer</span>
            </div>
        </div>
        <div class="sidebar-navs">
            <ul class="nav nav-pills-circle">
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Support">
                    <a class="icon" href="index-2.html#">
                        <i class="las la-life-ring header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Documentation">
                    <a class="icon" href="index-2.html#">
                        <i class="las  la-file-alt header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Projects">
                    <a href="index-2.html#" class="icon">
                        <i class="las la-project-diagram header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Settins">
                    <a class="icon" href="index-2.html#">
                        <i class="las la-cog header-icons"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Main</li>

        @if(Auth::user()->role == "1")
            <li class="slide">
                <a class="side-menu__item" href="{{ route('superAdminDashboard') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                        </svg>
                    <span class="side-menu__label">Dashboard</span> </a>
            </li>

			<li class="slide">
            <a class="side-menu__item" href="{{ route('add-user') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">User</span><span class="badge badge-danger side-badge">Hot</span></a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('add-student') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Add Student</span> </a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('materials') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Inputs</span> </a>
        </li>
		
		<li class="slide">
            <a class="side-menu__item" href="{{ route('request-status') }}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Request Status</span> </a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('store-status') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label"> Store Status</span> </a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('roles') }}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Roles</span> </a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('measurement') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Measurement</span> </a>
        </li>
		<li class="slide">
            <a class="side-menu__item" href="{{ route('schedule') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Schedule</span> </a>
        </li>
        @endif


        
        

        
	@if (Auth::user()->role == "2")
	<li class="slide">
            <a class="side-menu__item" href="{{ route('storeDashboard') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Dashboard</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('store-index') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Add Store</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('request-item') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Requested Items</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('storeReport') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">History</span> </a>
        </li>
@endif
       
@if (Auth::user()->role == "3")
        <li class="slide">
            <a class="side-menu__item" href="{{ route('out-store') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Request items</span> </a>
        </li>
 
        <li class="slide">
            <a class="side-menu__item" href="{{ route('schedules') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Schedules</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('tickerReport') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Report</span> </a>
        </li>
	@endif
     


        <li class="side-item side-item-category">Widgets & Maps</li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z" />
                    </svg>
                <span class="side-menu__label">Widgets</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
            </ul>
        </li>

    </ul>

</aside>
