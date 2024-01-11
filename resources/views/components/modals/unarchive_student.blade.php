<div class="modal fade" id="unarchiveStudentModal" tabindex="-1" role="dialog" aria-labelledby="unarchiveStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unarchiveStudentModalLabel">Confirm Unarchiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to unarchive this student?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="unarchive-student">
                    @csrf
                    <input id="NameOfStudentToUnarchive" type="hidden" name="NameOfStudentToUnarchive" value="">
                    <input id="idOfStudentToUnarchive" type="hidden" name="idOfStudentToUnarchive" value="">
                    <button type="submit" class="btn btn-success">Unarchive</button>
                </form>
            </div>
        </div>
    </div>
</div>
