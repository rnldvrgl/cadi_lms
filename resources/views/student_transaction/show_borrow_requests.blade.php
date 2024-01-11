    <!DOCTYPE html>
<html lang="en">

<head>


    <title>Dashboard</title>

    @include('components/header')
    @include('components.modals.SuccessModal')


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('components.sidebars.main_dash_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('components.navbar.main_dash_navbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">Transactions</h1>
                    <p class="mb-4">The books listed here are all based on the Mabalacat Community High School
                        Library.</p>
                    <a id="QRBorrow" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Scan QR to Borrow</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Books</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Process ID</th>
                                    <th>Borrower Name</th>
                                    <th>Book Title</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($borrowTransactionInfos as $bti)
                                    <tr>
                                        <td>{{$bti->process_id}}</td>
                                        <td>{{$bti->name}}</td>
                                        <td>{{$bti->title}}</td>
                                        <td>{{$bti->due_date}}</td>
                                        <td>{{$bti->return_date}}</td>

                                        {{--                                        {{$bti->due_date }} {{"Space"}} {{date("Y-m-d")}}{!! "<br>" !!}--}}

                                        @if($bti->is_returned == 3)
                                            <td><span
                                                    class="badge badge-success rounded-pill d-inline">Penalty Paid</span>
                                            </td>

                                        @elseif($bti->due_date < date("Y-m-d"))
                                            @if(empty($bti->return_date))
                                                <td><span
                                                        class="badge badge-danger rounded-pill d-inline">Overdue</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge badge-success rounded-pill d-inline">Returned</span>
                                                </td>
                                            @endif

                                        @else
                                            <td><span
                                                    class="badge badge-primary rounded-pill d-inline">No bad status</span>
                                            </td>
                                        @endif
                                        <td>
                                            {{--                                            showAlertAsModal--}}
                                            <div style="display: flex; gap: 5px">
                                                {{--                                                {{$bti->due_date}} {{date('Y-m-d')}}--}}
                                                @if($bti->due_date <= date("Y-m-d") && empty($bti->return_date))
                                                    <button onclick="editPenalty('{{$bti->book_id}}', '{{$bti->user_id}}','{{$bti->process_id}}')" class="btn btn-success btn-sm" title="Mark as paid"><i
                                                            class="far fa-check-circle"></i></button>
                                                    {{--                                                    <button onclick="showAddNotifModal('{{$bti->user_id}}','{{$bti->name}}')" href="#" class="btn btn-warning btn-sm" title="Notify Overdue">&nbsp<i class="fas fa-exclamation">&nbsp</i></button>--}}
{{--                                                    <button class="btn btn-info btn-sm" title="Edit penalty"><i--}}
{{--                                                            class="far fa-money-bill-alt"></i></button>--}}
                                                @endif
{{--                                                @if($bti->is_returned == 0 && $bti->due_date >= date("Y-m-d"))--}}
{{--                                                    <button id="QRReturn" onclick="toggleQrReturn()" class="btn btn-success btn-sm" title="Return">--}}
{{--                                                        <i class="far fa-arrow-alt-circle-left"></i></button>--}}
{{--                                                @endif--}}
                                                {{--                                                <button class="btn btn-info btn-sm open-edit-modal"><i class="fas fa-edit" title="{{trans('app.edit_info')}}"></i>--}}
                                                {{--
                                                                               </button>--}}
                                                <button onclick="deleteTransaction('{{$bti->process_id}}', '{{$bti->user_id}}')"
                                                        class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash-alt" title="Delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('components/footer')
        @include('test')
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('components/logout')
@include('components/modals/delete_book')
@include('components/modals/archive_book')
@include('components/modals/edit_book')
@include('components/modals/add_book')
@include('components/modals/user_notify')
@include('components/modals/delete_transaction')
@include('QrCode.Qr-Reader_borrow')
@include('components.modals.mark_paid')


{{--@include('QrCode.Qr-Reader_return')--}}

<!-- JavaScript to show the modal when the button is clicked -->
<script>
    $(document).ready(function () {
        $('#QRBorrow').click(function () {
            $('#borrowQR-modal').modal('show');
        });
    });
    // $(document).ready(function () {
    //     $('#QRReturn').click(function () {
    //         $('#returnQR-modal').modal('show');
    //         console.log("clickckckc");
    //     });
    // });
    function toggleQrReturn(){
        $('#returnQR-modal').modal('show');
        console.log("clickckckc");
    }
    function deleteTransaction(TransactionID, UserId){
        $("#process_id").val(TransactionID);
        $("#user_id").val(UserId);

        $("#deleteTransactionModal").modal("show");
    }
    function editPenalty(BookID,StudentID, ProcessID){
        $("#BookIDToPaid").val(BookID);
        $("#studentToMarkPaid").val(StudentID);
        $('#ProcessID').val(ProcessID);
        $("#markPaidModal").modal("show");
    }

    // function showDeleteTransaction(processID) {
    //     $("#process_id").val(processID);
    //     $("#deleteTransactionModal").modal("show");
    // }

    function showAddNotifModal(id, name) {
        $("#idOfStudentToNotify").val(id);
        $("#nameOfStudentToNotify").val(name);
        $("#addNotifModal").modal("show");
        console.log("clicked");
    }

    // ARCHIVE MODAL
    $(document).ready(function () {
        $(".showArchiveModal").click(function () {
            var itemId2 = $(this).data("item-id-2");
            var itemId3 = $(this).data("item-id-3");
            $("#itemToArchive").val(itemId2);
            $("#NameOfBookToArchive").val(itemId3);
            $("#archiveModal").modal("show");
        });
    });

    //ADD BOOK MODAL
    $(document).ready(function () {
        $("#add_book_btn").click(function () {
            $("#addBookModal").modal("show");
        });
    });

    //EDIT BOOK MODAL
    function populateEditModal(id, access_no, title, author, publication_place, publisher, copyright, available_count, borrowed_count, num_copies) {
        $("#idToEdit").val(id);
        $("#access_no").val(access_no);
        $("#title").val(title);
        $("#author").val(author);
        $("#publication_place").val(publication_place);
        $("#publisher").val(publisher);
        $("#copyright").val(copyright);
        $("#available_count").val(available_count);
        $("#borrowed_count").val(borrowed_count);
        $("#num_copies").val(num_copies);

        // Show the modal
        $("#editModal").modal("show");
    }


</script>

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
