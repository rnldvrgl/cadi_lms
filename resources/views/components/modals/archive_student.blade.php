<div class="modal fade" id="archiveStudentModal" tabindex="-1" role="dialog" aria-labelledby="archiveStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="archiveStudentModalLabel">Confirm Archiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to archive this student?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="archive-student">
                    @csrf
                    <input id="NameOfStudentToArchive" type="hidden" name="NameOfStudentToArchive" value="">
                    <input id="idOfStudentToArchive" type="hidden" name="idOfStudentToArchive" value="">
                    <button type="submit" class="btn btn-warning">Archive</button>
                </form>
            </div>
        </div>
    </div>
</div>
