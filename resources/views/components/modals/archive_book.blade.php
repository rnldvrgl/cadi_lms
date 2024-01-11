<div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="archiveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="archiveModalLabel">Confirm Archiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to archive this item?
                This action can't be undone.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="archive-book">
                    @csrf
                    <input id="NameOfBookToArchive" type="hidden" name="NameOfBookToArchive" value="">
                    <input id="itemToArchive" type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-warning">Archive</button>
                </form>
            </div>
        </div>
    </div>
</div>
