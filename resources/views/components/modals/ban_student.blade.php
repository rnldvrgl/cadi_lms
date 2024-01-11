<div class="modal fade" id="banStudentModal" tabindex="-1" role="dialog" aria-labelledby="banStudentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="banStudentModalLabel">Confirm banning student</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to ban this student?
                This action can be undone through edit student.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="ban-student">
                    @csrf
                    <input id="NameOfStudentToBan" type="hidden" name="NameOfStudentToBan" value="">
                    <input id="idOfStudentToBan" type="hidden" name="idOfStudentToBan" value="">
                    <button type="submit" class="btn btn-warning">Ban</button>
                </form>
            </div>
        </div>
    </div>
</div>
