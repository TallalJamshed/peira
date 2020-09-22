<!DOCTYPE html>
<html lang="en">
    @include('frontend.partials.header')
    <body id="page-top">
        <!-- Navigation-->
        @include('frontend.partials.navbar')
        <!-- Content-->
        @yield('content')
        <!-- Footer-->
        @include('frontend.partials.footer')
        @include('frontend.partials.footerscripts')
    </body>
</html>