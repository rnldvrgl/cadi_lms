<!-- In your Blade view -->
@if (session('success'))
    <!-- Your HTML code with the modal -->
    <div id="successModal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-bottom-left" role="document">
            <div class="modal-content">
                <div class="modal-body alert-success m-content">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

@elseif(session('failed'))
    <!-- Failed Modal -->
    <div id="failedModal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="failedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-bottom-left" role="document">
            <div class="modal-content">
                <div class="modal-body  alert-danger m-content">
                    {{ session('failed') }}
                    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times</button>--}}
                </div>
            </div>
        </div>
    </div>
@elseif(session('warning'))
    <!-- Failed Modal -->
    <div id="warningModal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-bottom-left" role="document">
            <div class="modal-content">
                <div class="modal-body  alert-warning m-content">
                    {{ session('warning') }}
                    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times</button>--}}
                </div>
            </div>
        </div>
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS library -->

<style>
    .m-content{
        padding-left: 40px;
        padding-right: 40px;
    }
    .modal-dialog-bottom-left {
        position: fixed;
        left: 0;
        bottom: 0;
        margin: 20px;
        transform: translate(0, 0);
    }
</style>
<!-- JavaScript to show modals automatically -->
<script>
    $(document).ready(function() {
        @if (session('success'))
        $('#successModal').modal('show');
        @elseif(session('failed'))
        $('#failedModal').modal('show');
        @elseif(session('warning'))
        $('#warningModal').modal('show');
        @endif


        // Automatically close the modals after 4 seconds
        setTimeout(function() {
            $('#successModal, #failedModal, #warningModal').modal('hide');
        }, 3000); // Adjust the duration in milliseconds (e.g., 5000 for 5 seconds)
    });
</script>
