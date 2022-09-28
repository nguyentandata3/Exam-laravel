<?php
    use Illuminate\Support\Facades\Auth;
?>
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                @if(Auth::user())
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('home/images/users/avatar-1.jpg') }}" alt="" height="65">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('home/images/users/avatar-2.jpg') }}" alt="" height="65">
                        </span>
                    </a>
                    <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('home/images/users/avatar-3.jpg') }}" alt="" height="65">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('home/images/users/avatar-4.jpg') }}" alt="" height="65">
                        </span>
                    </a>
                </div>
                @endif
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar="init" style="max-height: 320px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ ('assets/home/images/users/avatar-5.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ ('assets/home/images/users/avatar-3.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('home/images/users/avatar-2.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>

                        <div class="text-center pt-3 pb-1">
                            <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center">
                @if(Auth::user())
                <?php
                    $avatar = (empty(Auth::user()->avatar)) ? 'imagedefault.png' : Auth::user()->avatar;
                ?>
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <i class="logo logo-dark w-80" style="width:65px">
                        <span class="logo-sm">
                            <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}"><img src="{{ asset('images/'.$avatar) }}" alt="" width="50%"></a>
                        </span>
                        <span class="logo-lg">
                            <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}"><img src="{{ asset('images/'.$avatar) }}" alt="" width="50%"></a>
                        </span>
                    </i>
                    <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}" class="logo logo-dark w-20 ml-40 ">
                        <span class="logo-sm">
                            <i data-feather="log-out"></i>
                        </span>
                        <span class="logo-lg">
                            <i data-feather="log-out"></i>
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <i class="logo logo-light w-80" style="width:65px">
                        <span class="logo-sm">
                            <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}"><img src="{{ asset('images/'.$avatar) }}" alt="" width="100%"></a>
                        </span>
                        <span class="logo-lg">
                            <a href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}"><img src="{{ asset('images/'.$avatar) }}" alt="" width="100%"></a>
                        </span>
                    </i>

                    <a class="logo logo-light w-20 ml-10" href="{{ route('users.profile',['user_uuid' => (Auth::user()->uuid)]) }}"> {{Auth::user()->fullname}}
                    </a>
                    <a href="{{ route('logout') }}" class="logo logo-light w-20 ml-40">
                        <span class="logo-sm">
                            <i data-feather="log-out"></i>
                        </span>
                        <span class="logo-lg">
                            <i data-feather="log-out"></i>
                        </span>
                    </a>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</header>