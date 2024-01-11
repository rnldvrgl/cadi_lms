<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="img/MCHS_LOGO.png" height="50px" style="margin-left: -20px; margin-right: -18px">
        </div>
        <div class="sidebar-brand-text">{{ Session::get('name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
    <li class="nav-item active">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            MANAGE
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-users"></i>
                <span>Students</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage students:</h6>
                    <a class="collapse-item" href="view-students">Manage students</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-book"></i>
                <span>Books</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded  active">
                    <h6 class="collapse-header">Manage books:</h6>
{{--                    <a id="add_book_btn" class="collapse-item">Add new books</a>--}}
                    <a class="collapse-item active" href="view-books">View/Manage Books</a>
                    {{--                        <a class="collapse-item" href="utilities-other.blade.php">Other</a>--}}
                </div>
            </div>
        </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    @endif
    @if(Session::get('user_type') == 'student')
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="view-books">View Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view-transactions">View Transactions</a>
        </li>
    @endif
    @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
       aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Transactions</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students transactions:</h6>
            <a  class="collapse-item" href="return-requests">Return Requests</a>
            <a  class="collapse-item" href="borrow-book">Borrow Requests</a>

            @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
                <a class="collapse-item" href="borrow-requests">Transaction</a>
            @endif
            {{--                        <a class="collapse-item" href="forgot-password.blade.php">Forgot Password</a>--}}
            {{--                        <div class="collapse-divider"></div>--}}
            {{--                        <h6 class="collapse-header">Other Pages:</h6>--}}
            {{--                        <a class="collapse-item" href="404.html">404 Page</a>--}}
            {{--                        <a class="collapse-item" href="blank.html">Blank Page</a>--}}
        </div>
    </div>
</li>
    @endif
@if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="reports">
            <i class="fas fa-flag"></i>
            <span>Generate Reports</span></a>
    </li>
@endif
{{--    <!-- Nav Item - Charts -->--}}
{{--    <li class="nav-item">--}}
{{--        <a id="scanReturnBarrow" class="nav-link" href="#" data-toggle="collapse" data-target="#collapseQrPages">--}}
{{--            <i class="fas fa-flag"></i>--}}
{{--            <span>Scan QR</span></a>--}}
{{--        <div id="collapseQrPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Scan Borrow and Return</h6>--}}
{{--                <a id="scanQRB" class="collapse-item" href="#">Borrow</a>--}}
{{--                <a id="scanQRR" class="collapse-item" href="#">Return</a>--}}
{{--                --}}{{--                        <a class="collapse-item" href="forgot-password.blade.php">Forgot Password</a>--}}
{{--                --}}{{--                        <div class="collapse-divider"></div>--}}
{{--                --}}{{--                        <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                --}}{{--                        <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                --}}{{--                        <a class="collapse-item" href="blank.html">Blank Page</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
<script>
    // $(document).ready(function () {
    //     $('#QrReturn').click(function () {
    //         $('#borrowQR-modal').modal('show');
    //     });
    // });
    $(document).ready(function () {
        $('#QrReturn').click(function () {
            $('#returnQR-modal').modal('show');
        });
    });
</script>


{{--    <!-- Nav Item - Tables -->--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="table">--}}
{{--            <i class="fas fa-fw fa-table"></i>--}}
{{--            <span>Tables</span></a>--}}
{{--    </li>--}}

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


{{--            <!-- Sidebar Message -->--}}
{{--            <div class="sidebar-card d-none d-lg-flex">--}}
{{--                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">--}}
{{--                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>--}}
{{--                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>--}}
{{--            </div>--}}

</ul>
<!-- End of Sidebar -->
