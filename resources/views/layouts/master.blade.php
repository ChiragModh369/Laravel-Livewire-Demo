<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Invoika - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('layouts.css')
    @include('layouts.header_script')
    @livewireStyles
</head>

<body>
    <div id="layout-wrapper">
        @include("layouts.header")
        @include("layouts.sidebar")
        <div class="main-content">
            @include('common.alert')
            @yield("content")
            @include("layouts.footer")
        </div>
    </div>


    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    @include("layouts.script")
    @livewireScripts
    @stack('scripts')
</body>

</html>
