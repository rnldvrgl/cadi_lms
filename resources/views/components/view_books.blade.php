<!DOCTYPE html>
<html lang="en">

<head>


    <title>Dashboard</title>

    @include('components/header')

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('components.sidebars.main_dash_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include("components.navbar.main_dash_navbar")
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('components.modals.SuccessModal')


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3 mb-2 text-gray-800">Books</h1>
                    </div>
                    <div class="col-6 text-right">
                    @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
                        <a id="add_book_btn" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="tooltip" title="Add Books!">
                            <i class="fas fa-plus-circle"></i>
                            Add book</a>
                    @endif
                </div>



                <p class="mb-4">The books listed here are all based on the Mabalacat Community High School Library.</p>

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
                                    <th>Accesson number</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Place of publication</th>
                                    <th>Publisher</th>
                                    <th>Copyright</th>
                                    <th>No. of Copies</th>
                                    <th>Borrowed</th>
                                    <th>Available</th>
                                    <th>Status</th>
                                    <th>QR Code</th>
                                    @if(Session::get('user_type') == "admin" || Session::get('user_type') == "librarian")
                                            <th>Actions</th>

                                    @endif
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{$book->accesson_number}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->author}}</td>
                                        <td>{{$book->place_of_publication}}</td> {{-- the data fromthis doesnt work in edit--}}
                                        <td>{{$book->publisher}}</td>
                                        <td>{{$book->copyright}}</td>
                                        <td>{{$book->number_of_copies}}</td>
                                        <td>{{$book->borrowed_count}}</td>
                                        <td>{{$book->available_count}}</td>
                                        {{--CHECK IF BOOK STATUS 'ARCHIVED','BARROWED','AVAILABLE'--}}
                                            <?php
                                            $isBarrowed = "Invalid";
                                            if ($book->is_archived) {
                                                $isBarrowed = "Archived";
                                            } else {
                                                if ($book->barrowed_count < $book->available_count) {
                                                    $isBarrowed = "Available";
                                                } else {
                                                    $isBarrowed = "All books have been borrowed";
                                                }

                                            }
                                            ?>
                                        <td>{{$isBarrowed}}</td>
                                        <td><iframe src="http://127.0.0.1:8000/generate-qr/{{$book->id}}/{{$book->title}}" height="220px" width="220px" frameborder="none"></iframe></td>
                                        @if(Session::get('user_type') == "admin" || Session::get('user_type') == "librarian")

                                            <td>
                                                    <?php
                                                    $specialCharacters = ['\n', '<br />', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '[', ']', ':', ';', '<', '>', ',', '.', '?', '~', '|', '/'];

                                                    ?>
                                                <div style="display: flex; gap: 5px">
                                                    <button
                                                        onclick="populateEditModal('{{$book->id}}', '{{$book->accesson_number}}', '{{$book->title}}', '{{$book->author}}','{{json_encode(str_replace($specialCharacters, ' ',nl2br($book->place_of_publication)))}}','{{$book->publisher}}','{{$book->copyright}}','{{$book->available_count}}','{{$book->borrowed_count}}',{{$book->number_of_copies}},10)"
                                                        class="btn btn-info btn-sm open-edit-modal"><i class="fas fa-edit"
                                                                                                       title="Edit"></i>
                                                    </button>
                                                    <?php if ($book->is_archived == 0): ?>
                                                    <button data-item-id-2="{{ $book->id }}"
                                                            data-item-id-3="{{$book->title}}"
                                                            class="btn btn-warning btn-sm showArchiveModal"><i
                                                            class="fas fa-archive" title="Archive"></i></button>
                                                            <?php else: ?>
                                                    <button
                                                        data-item-id-2="{{ $book->id }}"
                                                        data-item-id-3="{{$book->title}}"
                                                        class="btn btn-success btn-sm showUnarchiveModal" title="Unarchive"><i
                                                            class="fas fa-key"></i></button>
                                                <?php endif; ?>
                                                    <button data-item-id="{{ $book->id }}"
                                                            data-item-id-2="{{ $book->title }}"
                                                            class="btn btn-danger btn-sm showDeleteModal"><i
                                                            class="fas fa-trash-alt" title="Delete"></i></button>
                                                </div>
                                            </td>
                                        @endif
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
@include('components/modals/unarchive_book')
@include('components/modals/edit_book')
@include('components/modals/add_book')
@include('QrCode.Qr-Generator')
<script>

    function showGenerateQr(){
        $("#generateQR-modal").modal("show");
    }
    // DELETE BOOK MODAL
    $(document).ready(function () {
        $(".showDeleteModal").click(function () {
            var itemId = $(this).data("item-id");
            var itemId2 = $(this).data("item-id-2");
            $("#itemToDelete").val(itemId);
            $("#nameOfItemToDelete").val(itemId2);
            $("#deleteModal").modal("show");
        });
    });
    // END OF DELETE BOOK MODAL

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

    $(document).ready(function () {
        $(".showUnarchiveModal").click(function () {
            var itemId2 = $(this).data("item-id-2");
            var itemId3 = $(this).data("item-id-3");
            $("#itemToUnarchive").val(itemId2);
            $("#NameOfBookToUnarchive").val(itemId3);
            $("#unarchiveModal").modal("show");
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
        // console.log('id ko to: ' + id);
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
