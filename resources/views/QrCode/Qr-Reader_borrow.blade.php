
<div class="modal fade" id="borrowQR-modal" data-bs-backdrop='static' data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="borrowQR-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowQRModal">Scan a QR to Borrow</h5>
                <button class="close" onclick="closeScanner()" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <div id="camera-container" class="row d-flex">

                    <div id="reader"></div>


                    <div id="result">
                        <h1 id="error_qr" style="display: none; text-align: center" class="text-danger m-5">Invalid<br>QR Code</h1>
                        <div id="success-fill" style="display: none; font-size: 12px" class="p-3">
                            <form action="process-borrow" method="POST" class="container">
                                <h3>Verify Details</h3>
                                @csrf
                                <label>Book ID: </label>
                                <input id="book_id" class="form-control" name="book_id" readonly>
                                <label>Book Title: </label>
                                <input id="book_title" class="form-control" name="book_title" readonly>
                                <label>Due Date: </label>
                                <input id="book_title" class="form-control" name="due_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . ' +4 days'))}}" readonly>
                                <label>Borrower ID: </label>
                                <input class="form-control" name="borrower_id" value="{{Session::get('user_id')}}">
                                <br>
                                <input type="submit" class="btn btn-primary form-control" value="Borrow">
                            </form>
                        </div>

                    </div>

            </div>

            <style>
                #camera-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #reader {
                    width: 500px;
                }
                #result {
                    text-align: left;
                    font-size: 1.5rem;
                    border-color: #335aca;
                }

                #html5-qrcode-select-camera{
                    padding: 7px;
                    border-color: #335aca;
                    width: 100%;
                }
                #html5-qrcode-button-camera-stop, #html5-qrcode-button-camera-start{
                    background-color: #335aca;
                    border: none;
                    color: white;
                    padding: 10px;
                    margin-top: 10px;
                    width: 100%;
                }
            </style>
            <script>
                function closeScanner(){
                    // scanner.stop();
                }
                const scanner = new Html5QrcodeScanner('reader', {
                    // Scanner will be initialized in DOM inside element with id of 'reader'
                    // qrbox: {
                    //     width: 500,
                    //     height: 500,
                    // },  // Sets dimensions of scanning box (set relative to reader element width)
                    fps: 30, // Frames per second to attempt a scan
                    color: "red",
                });

                scanner.render(success, error);
                // Starts scanner3

                function success(result) {
                    let qrData;
                    try{
                        qrData = JSON.parse(result);
                        if(qrData.value1 === undefined){
                               document.getElementById('success-fill').style.display = "none";
                            document.getElementById('error_qr').style.display = "block";
                        }else{
                            document.getElementById('error_qr').style.display = "none";
                            document.getElementById('success-fill').style.display = "block";


                            document.getElementById('book_id').value = qrData.value1;
                            document.getElementById('book_title').value = qrData.value2;
                        }
                    }catch (error){
                        // console.error('An error occured: ', error.message);
                        document.getElementById('success-fill').style.display = "none";
                        document.getElementById('error_qr').style.display = "block";

                    }


                }
                function error(err) {
                    // console.error(err);
                    // Prints any errors to the console
                }
            </script>

        </div>
    </div>
</div>
