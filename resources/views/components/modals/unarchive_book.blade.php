<div class="modal fade" id="unarchiveModal" tabindex="-1" role="dialog" aria-labelledby="unarchiveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unarchiveModalLabel">Confirm Unarchiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to unarchive this item?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="unarchive-book">
                    @csrf
                    <input id="NameOfBookToUnarchive" type="hidden" name="NameOfBookToUnarchive" value="">
                    <input id="itemToUnarchive" type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-warning">Unarchive</button>
                </form>
            </div>
        </div>
    </div>
</div>
