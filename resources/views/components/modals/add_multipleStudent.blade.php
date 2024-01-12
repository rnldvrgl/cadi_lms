<!-- Add Book Modal -->

@include('components/header')
<div class="modal fade" id="addMultipleStudentModal" tabindex="-1" role="dialog" aria-labelledby="addMultipleStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog  border-left-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMultipleStudentModalLabel">Add Student</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			<form action="upload-students" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                <input required type="file" name="csv_file" accept=".csv">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-upload fa-sm text-white-50"></i> Upload Students
                </button>
                </div>
            </form>
        </div>
    </div>
</div>
