<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
    <title>Profile</title>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('components.sidebars.main_dash_sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include("components.navbar.main_dash_navbar")
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
{{--                    <span class="text">Last login attempt: {{Session::get('last_login_time_date')}}</span>--}}
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-sm-6">
                        <form target="_blank" method="POST" action="log-reports">
                            <div>
                                <label>User ID: </label>
                                <input type="text" name="startDate" class="form-control" value="{{$user_id}}" disabled>
                                <label>Name: </label>
                                <input type="text" name="name" class="form-control" value="{{$name}}" disabled>
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control" value="{{$email}}" disabled>
                                <?php if ($user_type == 'student'): ?>
                                    <label>Grade:</label>
                                    <input type="text" name="grade" class="form-control" value="{{ $grade }}" disabled>
                                    <label>Section:</label>
                                    <input type="text" name="section" class="form-control" value="{{ $section }}" disabled>
                                <?php endif; ?>
                                <label>Date created:</label>
                                <input type="text" name="endDate" class="form-control" value="{{$date_created}}" disabled>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
            @include('components.footer')

        </div>
        <!-- End of Main Content -->

        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <a class="btn btn-primary" href="logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
