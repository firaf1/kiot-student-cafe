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
                @if(Auth::user()->image == null)
                @if(Auth::user()->gender == "Male")
                <img src="{{ asset('male_user.jpg') }}" style="width:200%; height:200%; " alt="user-img" class="avatar-xl rounded-circle ">
                @elseif(Auth::user()->gender == "Female")
                <img src="{{ asset('female_user.jpg') }}" alt="user-img" class="avatar-xl rounded-circle ">
              @endif 
              @else 
              <img src="{{ asset(Auth::user()->image) }}" style="width:100%; height:100%; " alt="user-img" class="avatar-xl rounded-circle ">
                @endif
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{ Auth::user()->fname }} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">
                    @if(Auth::user()->role =="1")
                    Super Admin
                    @elseif(Auth::user()->role == "2")
                    Store Admin @elseif(Auth::user()->role == "3") Admin @endif
                </span>
            </div>
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
        <li class="slide">
            <a class="side-menu__item" href="{{ route('schedules') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                <span class="side-menu__label">Schedule Status</span> </a>
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
                ><path d="M0 0h24v24H0zm18.31 6l-2.76 5z" fill="none"></path><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"></path><svg/>
                <span class="side-menu__label">Add Store</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('request-item') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M4 8.25l7.51 1-7.5-3.22zm.01 9.72l7.5-3.22-7.51 1z" opacity=".3"></path><path d="M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3zM4 8.25V6.03l7.51 3.22-7.51-1zm.01 9.72v-2.22l7.51-1-7.51 3.22z"></path><svg/>
                <span class="side-menu__label">Requested Items</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('storeReport') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24"
                    ><path d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8 0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8 0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8 0 3.31-2.69 6-6 6v-3l-4 4 4 4v-3c4.42 0 8-3.58 8-8 0-1.57-.46-3.03-1.24-4.26z"></path><path d="M0 0h24v24H0z" fill="none"></path><svg/>
                <span class="side-menu__label">History</span> </a>
        </li>
       
        <li class="slide">
            <a class="side-menu__item" href="{{ route('store') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6.5 10h-2v7h2v-7zm6 0h-2v7h2v-7zm8.5 9H2v2h19v-2zm-2.5-9h-2v7h2v-7zm-7-6.74L16.71 6H6.29l5.21-2.74m0-2.26L2 6v2h19V6l-9.5-5z"></path><svg/>
                <span class="side-menu__label">Store</span> </a>
        </li>
@endif
       
@if (Auth::user()->role == "3")
<li class="slide">
    <a class="side-menu__item" href="{{ route('betDashboard') }}">
        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
        width="24">
        <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                    d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">Dashboard</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('out-store') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24"><path d="M-74 29h48v48h-48V29zM0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>
                    <span class="side-menu__label">Request items</span> </a>
            </li>
 
       
	@endif
      

    </ul>

</aside>
