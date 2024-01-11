<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

{{--<!-- Button to Trigger the Success Alert Modal -->--}}
{{--<div class="container mt-5">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-6">--}}
{{--            <button type="button" class="btn btn-primary" id="showAlertAsModal">Show Alert as Modal</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Alert Modal -->
<div class="modal fade modal-position" id="alertAsModal" tabindex="-1" aria-labelledby="alertAsModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog float-right">
            <div class="modal-body">
                @if(true)
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> This alert box could indicate a successful or positive action.
    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>Failed!</strong> This alert box could indicate a failed action.
                    </div>
                @endif
            </div>
    </div>
</div>


<style>
    .modal-backdrop {
        display: none;
    }
    .modal-position{
        /*position: absolute;*/
        /*top: 75px !important; !* Adjust the top position as needed *!*/
        /*margin-top: 45% !important; !* Adjust the right position as needed *!*/
    }
</style>
<!-- JavaScript to show the alert as a modal when the button is clicked -->
<script>
    $(".showAlertAsModal").bind("click", function () {
        // Show the alert as a modal
        const alertAsModal = new bootstrap.Modal(document.getElementById("alertAsModal"));
        alertAsModal.show();


        setTimeout(function () {
            alertAsModal.hide();
        }, 3000);
    });
</script>
