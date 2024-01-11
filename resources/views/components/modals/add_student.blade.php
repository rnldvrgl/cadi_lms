<!-- Add Book Modal -->

@include('components/header')
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog  border-left-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="add-student">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_access_no">Full name</label>
                                    <input pattern="[A-Za-z\s]+" type="text" class="form-control" id="student_fullname" name="student_fullname" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_access_no">Grade</label>
                                    <input pattern="[0-9\s]+" type="text" class="form-control" id="student_fullname" name="student_grade" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_access_no">Section</label>
                                    <input pattern="[A-Za-z\s]+" type="text" class="form-control" id="student_fullname" name="student_section" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_title">Email</label>
                                    <input type="text" class="form-control" id="student_email" name="student_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_author">password</label>
                                    <input type="password" class="form-control" id="student_password" name="student_password" required>
                                </div>

                                <!-- Other form fields go here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add student</button>
                </div>
            </form>
        </div>
    </div>
</div>
