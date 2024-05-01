<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/admin-style.css">
    <link rel="shortcut icon" href="{{ asset('/') }}admin/assets/images/favicon.png" />
</head>
<body>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="container-scroller">
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav navbar-nav-left">
                            {{-- <li class="nav-item dropdown  d-lg-flex d-none">
                                <button type="button" class="btn btn-inverse-primary btn-sm">Product </button>
                            </li>
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm"
                                    id="nreportDropdown" href="#" data-bs-toggle="dropdown">
                                    Reports
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="nreportDropdown">
                                    <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-file-pdf text-primary"></i>
                                        Pdf
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-file-excel text-primary"></i>
                                        Exel
                                    </a>
                                </div>
                            </li> --}}
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a class="btn btn-inverse-primary btn-sm" href="{{ route('ShopSettings') }}">
                                    Shop Settings
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                    <span class="online-status"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="profileDropdown">
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                            <i class="mdi mdi-logout text-primary"></i>
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="mdi mdi-label-outline"></i>
                                <span class="menu-title">LookUp</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('LookupCreate') }}">Add LookUp</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('LookupManage') }}">Manage LookUp</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="mdi mdi-settings menu-icon"></i>
                                <span class="menu-title">Settings</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('CategoryCreate') }}">Add Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('CategoryManage') }}">Manage Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('SubCategoryCreate') }}">Add SubCategory</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('SubCategoryManage') }}">Manage SubCategory</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('BrandCreate') }}">Add Brand</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('BrandManage') }}">Manage Brand</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('SupplierCreate') }}">Add Supplier</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('SupplierManage') }}">Manage Supplier</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('CustomerCreate') }}">Add Customer</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('CustomerManage') }}">Manage Customer</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="mdi mdi-cube-outline menu-icon"></i>
                                <span class="menu-title">Product</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('ProductCreate') }}">Add Product</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('ProductManage') }}">Manage Product</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-cube-outline menu-icon"></i>
                                <span class="menu-title">UI Elements</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/basic_elements.html" class="nav-link">
                                <i class="mdi mdi-chart-areaspline menu-icon"></i>
                                <span class="menu-title">Form Elements</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="mdi mdi-finance menu-icon"></i>
                                <span class="menu-title">Charts</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/basic-table.html" class="nav-link">
                                <i class="mdi mdi-grid menu-icon"></i>
                                <span class="menu-title">Tables</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/icons/mdi.html" class="nav-link">
                                <i class="mdi mdi-emoticon menu-icon"></i>
                                <span class="menu-title">Icons</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Sample Pages</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="docs/documentation.html" class="nav-link">
                                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                <span class="menu-title">Documentation</span></a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield("adminMainContent")
                </div>
                <footer class="footer">
                    <div class="footer-wrap">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                                Copyright © <a href="{{ url('/') }}" target="_blank"> company name </a> <?php echo date('Y');?>
                            </span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{asset('/')}}admin/assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{asset('/')}}admin/assets/js/template.js"></script>
    <script src="{{asset('/')}}admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('/')}}admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('/')}}admin/assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="{{asset('/')}}admin/assets/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="{{asset('/')}}admin/assets/vendors/justgage/justgage.js"></script>
    <script src="{{asset('/')}}admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{asset('/')}}admin/assets/js/dashboard.js"></script>
    @yield('extraScripts')
    <script>
        var _token = $("#token").val();
    </script>
</body>
</html>
