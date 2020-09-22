<!DOCTYPE html>
<html lang="en">
    @include('backend.partials.header')
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('backend.partials.sidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('backend.partials.navbar')
                    @if(Session::has('message'))
                    <div class="container-fluid">
                        <div class="alert {{Session::get('alert-class')}}" style="border-radius:10px">
                            <h1 class="h3 mb-2 text-center text-white">{{Session::get('message')}}</h1>
                        </div>
                    </div>
                    @endif
                    @yield('content')
                </div>
                <!-- End of Main Content -->
                @include('backend.partials.footer')
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @include('backend.partials.footerscripts')
    </body>
</html>
    