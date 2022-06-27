<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Site')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminpanel/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('adminpanel/assets/vendors/iconly/bold.css')}}">
    @yield('css')

    <link rel="stylesheet" href="{{asset('adminpanel/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('adminpanel/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminpanel/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('adminpanel/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href=""><img src="{{asset('adminpanel/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">


                    <li
                        class="sidebar-item active ">
                        <a href="" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Site Ayarları</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('about.list')}}">Hakkımızda</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('contact.list')}}">İletişim</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('menu.list')}}">Menü</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>@yield('headingTitle')</h3>
        </div>

        <div class="page-content">
            @yield('content')
        </div>


        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">A. Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('adminpanel/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('adminpanel/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('adminpanel/assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('adminpanel/assets/js/pages/dashboard.js')}}"></script>

<script src="{{asset('adminpanel/assets/js/mazer.js')}}"></script>
@yield('js')
</body>

</html>
