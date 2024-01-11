<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
    <title>Return Book</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  @include('components.sidebars.main_dash_sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include("components.navbar.main_dash_navbar")
            @include('components.modals.SuccessModal')

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Scan To Return Book</h1>
{{--                    <span class="text">Last login attempt: {{Session::get('last_login_time_date')}}</span>--}}
                </div>
                    <div class="row justify-content-center">
                        <div id="reader"></div>
                        <div id="result">
                            <h1 id="error_qr" style="display: none; text-align: center" class="text-danger m-5">Invalid<br>QR Code</h1>
                            <div id="success-fill" style="display: none; font-size: 12px" class="justify-content-center">
                                <form action="process-return" method="POST" class="container">
                                    <h3>Verify Details</h3>
                                    @csrf
                                    <label>Book ID: </label>
                                    <input id="book_id" class="form-control" name="book_id" readonly>
                                    {{--                                <label>Due Date: </label>--}}
                                    {{--                                <input id=due_date" class="form-control" name="due_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . ' +4 days'))}}" readonly>--}}
                                    <label>Book Title:  </label>
                                    <input id="book_title" class="form-control" name="book_title" readonly>
                                    <label>Borrower ID: </label>
                                    <input class="form-control" name="borrower_id" required>
                                    <br>
                                    <input type="submit" class="btn btn-primary form-control" value="Return">
                                </form>
                            </div>

                        </div>
                        <style>
                            #camera-container {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }
                            #reader {
                                width: 500px;
                            }
                            #result {
                                text-align: left;
                                font-size: 1.5rem;
                                border-color: #335aca;
                            }

                            #html5-qrcode-select-camera{
                                padding: 7px;
                                border-color: #335aca;
                                width: 100%;
                            }
                            #html5-qrcode-button-camera-stop, #html5-qrcode-button-camera-start{
                                background-color: #335aca;
                                border: none;
                                color: white;
                                padding: 10px;
                                margin-top: 10px;
                                width: 100%;
                            }
                        </style>
                        <script>
                            const scanner = new Html5QrcodeScanner('reader', {
                                // Scanner will be initialized in DOM inside element with id of 'reader'
                                // qrbox: {
                                //     width: 400,
                                //     height: 400,
                                // },  // Sets dimensions of scanning box (set relative to reader element width)
                                fps: 30, // Frames per second to attempt a scan
                                color: "blue"
                            });

                            scanner.render(success, error);
                            // Starts scanner

                            function success(result) {
                                let qrData;
                                try{
                                    qrData = JSON.parse(result);
                                    console.log(qrData);
                                    if(qrData.value1 === undefined){
                                        document.getElementById('success-fill').style.display = "none";
                                        document.getElementById('error_qr').style.display = "block";
                                        console.log("falso");
                                    }else{
                                        document.getElementById('error_qr').style.display = "none";
                                        document.getElementById('success-fill').style.display = "block";
                                        console.log("truelala");


                                        document.getElementById('book_id').value = qrData.value1;
                                        document.getElementById('book_title').value = qrData.value2;
                                    }
                                }catch (error){
                                    // console.error('An error occured: ', error.message);
                                    document.getElementById('success-fill').style.display = "none";
                                    document.getElementById('error_qr').style.display = "block";
                                    console.log(error.message)

                                }


                            }
                            function error(err) {
                                // console.error(err);
                                // Prints any errors to the console
                            }
                        </script>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
            @include('components.footer')


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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
