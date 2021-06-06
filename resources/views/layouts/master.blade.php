<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('styles/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/argon.css') }}">
    @yield('head')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
</head>

<body class="bgBody">
    <nav class="navbar navbar-expand-lg main-navbar position-absolute bg-primary">
        <div class="mr-auto">
            <h4 class="mb-0 navbar-brand ml-3 text-white">@yield('nama_menu')</h4>
        </div>
        <div class="navbar-nav navbar-rigth dropdown">
            <div class=" d-flex align-items-center text-white mr-5" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i>
                <span>{{__($user->email)}}</span>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-sidebar">
        <aside class="sidebar-wrapper">
            <div class="sidebar-brand">SIA</div>
            <div class="sidebar-brand sidebar-brand-sm">S</div>
            <div class="d-flex flex-column align-items-center m-3">
                <img src="{{ asset($user->foto) }}" alt="user" width="70" class="rounded-circle">
                <h4 class="mb-0">{{__($user->name)}}</h4>
                <small class="text-muted">{{__($user->role)}}</small>
            </div>
            <ul class="sidebar-menu">
                <li class="nav-item @if($page=='dashboard') show @endif">
                    <a href="{{ route("dashboard")}}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if ($user->role != "owner")
                <li class="nav-item @if($page=='data_akun') show @endif">
                    <a href="{{ route('data_akun') }}">
                        <i class="fas fa-file-invoice"></i>
                        <span>Data Akun</span>
                    </a>
                </li>
                @else
                <li class="nav-item @if($page=='user') show @endif">
                    <a href="{{ route('karyawan') }}">
                        <i class="fas fa-user"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>
                @endif
                <li class="nav-item @if($page=='jurnal_umum') show @endif">
                    <a href="{{ route('jurnal_umum_main') }}">
                        <i class="fas fa-book"></i>
                        <span>Jurnal Umum</span>
                    </a>
                </li>
                <li class="nav-item @if($page=='buku_besar') show @endif">
                    <a href="{{ route('buku_besar_main') }}">
                        <i class="fas fa-book"></i>
                        <span>Buku Besar</span>
                    </a>
                </li>
                <li class="nav-item @if($page=='neraca') show @endif">
                    <a href="{{ route('neraca_main') }}">
                        <i class="fas fa-balance-scale"></i>
                        <span>Neraca</span>
                    </a>
                </li>
                <li class="nav-item @if($page=='laporan') show @endif">
                    <a href="{{ route('laporan') }}">
                        <i class="fas fa-print"></i>
                        <span>Laporan Laba Rugi</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
    <div class="main-content">
        <section class="section">
            @yield('content')
        </section>
    </div>
    <div class="main-footer">
        <div class="d-flex flex-wrap align-items-center">
            Copyright
            <i class="fas fa-copyright mr-1 ml-1"></i>
            {{date("Y", time())}}
        </div>
    </div>
    @yield('modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
