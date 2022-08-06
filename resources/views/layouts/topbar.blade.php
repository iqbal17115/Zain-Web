<header id="page-topbar">
    <div class="navbar-header">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background-color: #F54748;">
                <a href="{{url('/dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{URL::asset('public/assets/images/logo.svg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{URL::asset('assets/images/logo-dark.png')}}" alt="" height="17">
                    </span>
                </a>

                <a href="{{url('/dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{URL::asset('public/assets/images/logo.svg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <!-- <img src="{{ asset('brta-logo.png') }}" alt="" style="height: 40px;width:40px;"> -->
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                 

                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="" src="{{ asset('brta-logo.png') }}" alt="Header Language" style="height: 50px;">
                </button>
            </div>
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{URL::asset('public/assets/images/users/avatar-1.jpg')}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <div class="dropdown-divider"></div>
                    <a class="log-out-btn dropdown-item text-danger" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                    </form>
                    {{-- <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" wire:click="{{Auth::logout()}}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('Logout') }} </a> --}}
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</header>