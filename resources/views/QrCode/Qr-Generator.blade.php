
<div class="modal fade" id="generateQR-modal" data-bs-backdrop='static' tabindex="-1" role="dialog" aria-labelledby="borrowQR-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generateQR-modal">Qr Code</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="camera-container" class="row d-flex">

                <div id="reader"></div>


                <div id="result">
                    <h1 id="error_qr" style="display: none; text-align: center" class="text-danger m-5">Invalid<br>QR Code</h1>
                    <div id="success-fill" style="display: none; font-size: 12px" class="p-3">
                        <iframe src="https://communityhighschool.online/generate-qr/123123/pasilyo"></iframe>
                        <form action="process-borrow" method="POST" class="container">
{{--                            {{$QrCode}}--}}
                            <h3>Generated QR</h3>
                            @csrf
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
