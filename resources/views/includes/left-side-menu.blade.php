<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="/">
            <img src="{{ asset('front/wollo.png') }}" style="width:100%; margin-top:-10px;  height:150%;"
                class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="{{ asset('front/wollo.png') }}" class="header-brand-img dark-logo" alt="Admintro logo">
            <img src="{{ asset('front/wollo2.png') }}" class="header-brand-img mobile-logo" alt="Admintro logo">
            <img src="{{ asset('front/wollo2.png') }}" class="header-brand-img darkmobile-logo" alt="Admintro logo">
        </a>
    </div>

    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                @if (Auth::user()->image == null)
                    @if (Auth::user()->gender == 'Male')
                        <img src="{{ asset('male_user.jpg') }}" style="width:200%; height:200%; " alt="user-img"
                            class="avatar-xl rounded-circle ">
                    @elseif(Auth::user()->gender == 'Female')
                        <img src="{{ asset('female_user.jpg') }}" alt="user-img" class="avatar-xl rounded-circle ">
                    @endif
                @else
                    <img src="{{ asset(Auth::user()->image) }}" style="width:100%; height:100%; " alt="user-img"
                        class="avatar-xl rounded-circle ">
                @endif
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{ Auth::user()->fname }} <i class="ion-checkmark-circled  text-success fs-12"></i>
                </h5>
                <span class="text-muted app-sidebar__user-name text-sm">
                    @if (Auth::user()->role == '1')
                        @lang('cafeAdmin')
                    @elseif(Auth::user()->role == '2')
                        @lang('StoreAdmin')
                        @elseif(Auth::user()->role == '0')
                        @lang('registeralOffice')
                    @elseif(Auth::user()->role == '3')
                    {{ Auth::user()->roleName() }}
                         @lang('subAdmin')
                        @elseif(Auth::user()->role == '4')
                        @lang('securtyAdmin')
                        @elseif(Auth::user()->role == '5')
                         @lang('ticker')
                    @endif
                </span>
            </div>
        </div>

    </div>

    <ul class="side-menu app-sidebar3">

        @if (Auth::user()->role == '0')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('add-user') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('User')</span><span class="badge badge-danger side-badge">Hot</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('add-student') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Add_Student')</span> </a>
            </li>
        @endif
        @if (Auth::user()->role == '1')
        <li class="slide">
            <a class="side-menu__item" href="{{ route('superAdminDashboard') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                width="24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
            </svg>
            <span class="side-menu__label">@lang('Dashboard')</span> </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('measurement') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 3H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 10h3.13c.21.78.67 1.47 1.27 2H5v-2zm14 2h-4.4c.6-.53 1.06-1.22 1.27-2H19v2zm0-4h-5v1c0 1.07-.93 2-2 2s-2-.93-2-2V8H5V5h14v3zm-5 7v1c0 .47-.19.9-.48 1.25-.37.45-.92.75-1.52.75s-1.15-.3-1.52-.75c-.29-.35-.48-.78-.48-1.25v-1H3v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-7zm-9 2h3.13c.02.09.06.17.09.25.24.68.65 1.28 1.18 1.75H5v-2zm14 2h-4.4c.54-.47.95-1.07 1.18-1.75.03-.08.07-.16.09-.25H19v2z"></path><path d="M8.13 10H5v2h4.4c-.6-.53-1.06-1.22-1.27-2zm6.47 2H19v-2h-3.13c-.21.78-.67 1.47-1.27 2zm-6.38 5.25c-.03-.08-.06-.16-.09-.25H5v2h4.4c-.53-.47-.94-1.07-1.18-1.75zm7.65-.25c-.02.09-.06.17-.09.25-.23.68-.64 1.28-1.18 1.75H19v-2h-3.13z" opacity=".3"></path></svg>
                <span class="side-menu__label">@lang('Measurement')</span> </a>
        </li>

        <li class="slide">
                <a class="side-menu__item" href="{{ route('roles') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 5v14H5V5h14m0-2H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 9c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3zm0-4c-.55 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1zm6 10H6v-1.53c0-2.5 3.97-3.58 6-3.58s6 1.08 6 3.58V18zm-9.69-2h7.38c-.69-.56-2.38-1.12-3.69-1.12s-3.01.56-3.69 1.12z"></path></svg>
                    <span class="side-menu__label">@lang('Roles')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('materials') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0zm18.31 6l-2.76 5z" fill="none"></path><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"></path></svg>
                       
                    <span class="side-menu__label">@lang('Inputs')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('store-status') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"></rect></g><g><g><rect height="7" width="3" x="4" y="10"></rect><rect height="7" width="3" x="10.5" y="10"></rect><rect height="3" width="20" x="2" y="19"></rect><rect height="7" width="3" x="17" y="10"></rect><polygon points="12,1 2,6 2,8 22,8 22,6"></polygon></g></g></svg>
                    <span class="side-menu__label"> @lang('Store_Status')</span> </a>
            </li>
            
            <li class="slide">
                <a class="side-menu__item" href="{{ route('request-status') }}">
                     
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M4 8.25l7.51 1-7.5-3.22zm.01 9.72l7.5-3.22-7.51 1z" opacity=".3"></path><path d="M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3zM4 8.25V6.03l7.51 3.22-7.51-1zm.01 9.72v-2.22l7.51-1-7.51 3.22z"></path></svg>
                    <span class="side-menu__label">@lang('Request_Status')</span> </a>

            </li>
           
            <li class="slide">
                <a class="side-menu__item" href="{{ route('schedule') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"></path></svg>
                    <span class="side-menu__label">@lang('Schedule')</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('tickerReport') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M18 9l-1.41-1.42L10 14.17l-2.59-2.58L6 13l4 4zm1-6h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-.14 0-.27.01-.4.04-.39.08-.74.28-1.01.55-.18.18-.33.4-.43.64-.1.23-.16.49-.16.77v14c0 .27.06.54.16.78s.25.45.43.64c.27.27.62.47 1.01.55.13.02.26.03.4.03h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z"></path></svg>
                    <span class="side-menu__label">@lang('Report')</span> </a>
            </li>
        @endif

        @if (Auth::user()->role == '5')
        <li class="slide">
                <a class="side-menu__item" href="{{ route('tickerConsuption') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">Consumption</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('schedules') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Schedule_Status')</span> </a>
            </li>
            
        @endif
        @if (Auth::user()->role == '2')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('storeDashboard') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Dashboard')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('store-index') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0zm18.31 6l-2.76 5z" fill="none"></path>
                        <path
                            d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Add_Store')</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('request-item') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M4 8.25l7.51 1-7.5-3.22zm.01 9.72l7.5-3.22-7.51 1z" opacity=".3"></path>
                        <path
                            d="M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3zM4 8.25V6.03l7.51 3.22-7.51-1zm.01 9.72v-2.22l7.51-1-7.51 3.22z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Requested_Items')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('storeReport') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path
                            d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8 0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8 0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8 0 3.31-2.69 6-6 6v-3l-4 4 4 4v-3c4.42 0 8-3.58 8-8 0-1.57-.46-3.03-1.24-4.26z">
                        </path>
                        <path d="M0 0h24v24H0z" fill="none"></path>
                    </svg>
                    <span class="side-menu__label">@lang('History')</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('store') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path
                            d="M6.5 10h-2v7h2v-7zm6 0h-2v7h2v-7zm8.5 9H2v2h19v-2zm-2.5-9h-2v7h2v-7zm-7-6.74L16.71 6H6.29l5.21-2.74m0-2.26L2 6v2h19V6l-9.5-5z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Store')</span> </a>
            </li>
        @endif

        @if (Auth::user()->role == '3')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('betDashboard') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Dashboard')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('out-store') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M-74 29h48v48h-48V29zM0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                        <path
                            d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Request_items')</span> </a>
            </li>

            @if(Auth::user()->roleNameCheck() != '')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('consuption') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0zm18.31 6l-2.76 5z" fill="none"></path><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"></path></svg>
                    <span class="side-menu__label">Consumption</span> </a>
            </li>

            @endif

        @endif

        @if (Auth::user()->role == '4')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('securtyDashboard') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Dashboard')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('property') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M20 6h-3V4c0-1.11-.89-2-2-2H9c-1.11 0-2 .89-2 2v2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zM9 4h6v2H9V4zm11 15H4v-2h16v2zm0-5H4V8h3v2h2V8h6v2h2V8h3v6z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Properties')</span> </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('propertyReport') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-6 15h-2v-2h2v2zm0-4h-2V8h2v6zm-1-9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z">
                        </path>
                    </svg>
                    <span class="side-menu__label">@lang('Property_Report')</span> </a>
            </li>
        @endif
    </ul>

</aside>
