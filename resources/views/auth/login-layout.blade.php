<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Sign In | Invoika - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    @include('layouts.css')
</head>
<body class="auth-bg 100-vh">
    <div class="bg-overlay bg-light"></div>
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-4">
                                <div class="text-center mb-5">
                                    <a href="javascript:void(0);">
                                        <span class="logo-lg">
                                            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="21">
                                        </span>
                                    </a>
                                </div>
                                @yield("content")
                                {{-- @include('auth.loginfooter') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.script")
</body>
</html>
