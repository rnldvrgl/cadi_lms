<div class="modal fade" id="addNotifModal" tabindex="-1" role="dialog" aria-labelledby="archiveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNotifModalLabel">Confirm sending notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to notify this student?
                This action can't be undone.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="notify-user">
                    @csrf
                    <input id="idOfStudentToNotify" type="hidden" name="idOfStudentToNotify" value="">
                    <input id="nameOfStudentToNotify" type="hidden" name="nameOfStudentToNotify" value="">
                    <button type="submit" class="btn btn-warning">Archive</button>
                </form>
            </div>
        </div>
    </div>
</div>
