<div class="modal fade" id="markPaidModal" tabindex="-1" role="dialog" aria-labelledby="markPaidModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="markPaidModalLabel"><strong>Confirm Payment</strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                By clicking yes you are sure that this students already made the payment.<br>
                <strong>This action can't be undone.</strong>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="mark-paid">
                    @csrf
                    <input id="BookIDToPaid" type="hidden" name="BookIDToPaid" value="">
                    <input id="studentToMarkPaid" type="hidden" name="studentToMarkPaid" value="">
                    <input id="ProcessID" type="hidden" name="ProcessID" value="">
                    <button type="submit" class="btn btn-warning">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
