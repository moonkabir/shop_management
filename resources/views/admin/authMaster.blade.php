<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/style.css">
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                {{-- <div class="brand-logo">
                                    <img src="{{asset('/')}}admin/assets/images/logo.svg" alt="logo">
                                </div> --}}
                                @yield("authMainContent")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/')}}admin/assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{asset('/')}}admin/assets/js/template.js"></script>
</body>
</html>
