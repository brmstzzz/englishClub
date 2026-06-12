<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — @yield('title', 'English Club')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}">

    <!-- Quixlab Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')

</head>

<body>
    {{-- PRELOADER --}}
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div id="main-wrapper">

        {{-- NAV HEADER (Logo) --}}
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ route('admin.dashboard') }}">

                    {{-- Icon kecil saat sidebar dikecilkan --}}
                    <b class="logo-abbr">
                        <span style="
                display:block;
                text-align:center;
                width:100%;
                color:#ffffff;
                font-weight:800;
                font-size:20px;
                font-family:'Poppins',sans-serif;
                letter-spacing:-0.5px;  
                    ">EC</span>
                    </b>

                    {{-- Teks saat sidebar normal --}}
                    <span class="brand-title" style="
                color:#FFFF00;
                font-family:'Poppins',sans-serif;
                font-weight:800;
                font-size:1.1rem;
                letter-spacing:1px;
            ">ENGLISH<span style="color:rgba(255,255,255,0.6);">CLUB</span></span>

                </a>
            </div>
        </div>

        {{-- TOP HEADER --}}
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ asset('assets/images/user/1.png') }}" height="40" width="40" alt="Admin">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <i class="icon-key"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="{{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.schedules*') ? 'active' : '' }}">
                        <a href="{{ route('admin.schedules.index') }}" aria-expanded="false">
                            <i class="icon-clock menu-icon"></i>
                            <span class="nav-text">Schedules</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.participants*') ? 'active' : '' }}">
                        <a href="{{ route('admin.participants.index') }}" aria-expanded="false">
                            <i class="icon-people menu-icon"></i>
                            <span class="nav-text">Data Partisipan</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                        <a href="{{ route('admin.events.index') }}" aria-expanded="false">
                            <i class="icon-star menu-icon"></i>
                            <span class="nav-text">Event</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="content-body">
            <div class="container-fluid">

                {{-- FLASH MESSAGES --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </div>
        </div>

        {{-- FOOTER --}}
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; {{ date('Y') }} <strong>English Club</strong>. All rights reserved.</p>
            </div>
        </div>

    </div>{{-- #main-wrapper --}}

    {{-- SCRIPTS --}}
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    {{-- Auto-dismiss flash alert --}}
    <script>
        setTimeout(function () {
            ['alert-success', 'alert-danger'].forEach(function (id) {
                let el = document.getElementById(id);
                if (el) {
                    el.style.transition = 'opacity 0.5s ease';
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);
                }
            });
        }, 3000);
    </script>

    @stack('scripts')

</body>

</html>