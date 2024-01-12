<!DOCTYPE html>
<html lang="en">

<head>

    @include('components/header')
    {{--    {{trans('app.date_hours') }}--}}
    <title>Dashboard</title>
    @include('components.modals.LogoutModal')
    @include('components.modals.SuccessModal')




</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

   @include("components.sidebars.main_dash_sidebar")

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include("components.navbar.main_dash_navbar")
            @include('components.modals.add_student')
            @include('components.modals.add_multipleStudent')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Students</h1>
                    <div>
                    {{-- Upload csv file --}}
                    <a href="#" onclick="addMultipleStudentModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Add Mutilple students</a>

                    <a href="#" onclick="addStudentModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Add student</a>
                </div>
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
                                    <th>Student ID</th>
                                    <th>Name</th>
{{--                                    <th>Username</th>--}}
                                    <th>Email</th>
                                    <th>Grade</th>
                                    <th>Section</th>
{{--                                    <th>Verified status</th>--}}
                                    <th>Status</th>
                                    <th>Last login</th>
                                    <th>Date created</th>
                                    <th>Last Modified</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_student as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
{{--                                        <td>{{$student->uname}}</td>--}}
                                        <td>{{$student->email}}</td> 
                                        <td>{{$student->grade}}</td>
                                        <td>{{$student->section}}</td>
                                        {{-- the data fromthis doesnt work in edit--}}

{{--                                        @if($student->is_verified == 0)--}}
{{--                                            <td><span--}}
{{--                                                    class="badge badge-warning rounded-pill d-inline">Not Verified</span>--}}
{{--                                            </td>--}}
{{--                                        @else--}}
{{--                                            <td><span class="badge badge-success rounded-pill d-inline">Verified</span>--}}
{{--                                            </td>--}}
{{--                                        @endif--}}

                                        @if($student->is_active == 0)
                                            <td><span
                                                    class="badge badge-secondary rounded-pill d-inline">Not Active</span>
                                            </td>
                                        @elseif($student->is_banned == 1)
                                            <td><span class="badge badge-danger rounded-pill d-inline">Banned</span>
                                            </td>
                                        @elseif($student->is_archived == 1)
                                            <td><span class="badge badge-info rounded-pill d-inline">Archived</span>
                                            </td>
                                        @else
                                            <td><span class="badge badge-success rounded-pill d-inline">Active</span>
                                            </td>
                                        @endif
                                        <td>{{$student->last_login}}</td>
                                        <td>{{$student->created_at}}</td>
                                            <?php $update = $student->updated_at ? $student->updated_at : "Not yet modified"; ?>
                                        <td>{{  $update }}</td>
                                        <td>
                                            <div style="display: flex; gap: 5px">
                                                <button
                                                    onclick="populateEditStudentModal('{{$student->id}}', '{{$student->name}}','{{$student->email}}','{{$student->is_banned}}','{{$student->is_active}}', '{{$student->grade}}', '{{$student->section}}')"
                                                    class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                                                <?php if ($student->is_archived == 0): ?>
                                                    <button
                                                        onclick="populateArchiveStudentModal('{{$student->id}}', '{{$student->name}}')"
                                                        class="btn btn-info btn-sm" title="{{trans('app.archive_user')}}"><i
                                                            class="fas fa-file-archive archiveStudentModal"></i></button>
                                                <?php else: ?>
                                                    <button
                                                        onclick="populateUnarchiveStudentModal('{{$student->id}}', '{{$student->name}}')"
                                                        class="btn btn-success btn-sm" title="{{trans('app.unarchive_user')}}"><i
                                                            class="fas fa-key"></i></button>
                                                <?php endif; ?>
                                                <button data-item-id="{{ $student->id }}"
                                                        data-item-id-2="{{ $student->name}}"
                                                        class="btn btn-danger btn-sm showDeleteModal"><i
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

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Cadi Media 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('components/logout')
@include('components/modals/delete_student')
@include('components/modals/archive_book')
@include('components/modals/edit_book')
@include('components/modals/ban_student')
@include('components/modals/edit_student')
@include('components/modals/archive_student')
@include('components/modals/unarchive_student')


<!-- JavaScript to show the modal when the button is clicked -->
<script>
    //SHOW ADD STUDENT MODAL
    function addStudentModal(){
        $("#addStudentModal").modal("show");
    }

    function addMultipleStudentModal(){
          $("#addMultipleStudentModal").modal("show");
    }

    //EDIT BOOK MODAL
    function populateEditStudentModal(id, name, email, is_banned, is_active, grade, section) {
        $("#studentIdToEdit").val(id);
        $("#edit_name").val(name);
        $("#edit_email").val(email);
        $("#edit_grade").val(grade);
        $("#edit_section").val(section);
        $("#edit_active").val(is_active);
        $("#edit_banned").val(is_banned);

        var checkbox = document.getElementById('flexSwitchCheckChecked');
        if(is_active == 1){
            checkbox.checked = true;
        }else{
            checkbox.checked = false;

        }
        // Show the modal
        $("#editStudentModal").modal("show");
    }

    // ARCHIVE STUDENT MODAL
    function populateArchiveStudentModal(id, name) {
        $("#NameOfStudentToArchive").val(name);
        $("#idOfStudentToArchive").val(id);
        $("#archiveStudentModal").modal("show");
    }

    function populateUnarchiveStudentModal(id, name) {
        $("#NameOfStudentToUnnarchive").val(name);
        $("#idOfStudentToUnarchive").val(id);
        $("#unarchiveStudentModal").modal("show");
    }

    // BAN STUDENT MODAL
    $(document).ready(function () {
        $(".banStudentModal").click(function () {
            var studentID = $(this).data("student-id");
            var studentName = $(this).data("student-name");
            $("#NameOfStudentToBan").val(studentName);
            $("#idOfStudentToBan").val(studentID);
            $("#banStudentModal").modal("show");
            console.log("clicked");
        });
    });

    // DELETE STUDENT MODAL
    $(document).ready(function () {
        $(".showDeleteModal").click(function () {
            var itemId = $(this).data("item-id");
            var itemId2 = $(this).data("item-id-2");
            $("#itemToDelete").val(itemId);
            $("#nameOfItemToDelete").val(itemId2);
            $("#deleteStudentModal").modal("show");
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

@include('components.footer')

</body>

</html>
