
<div class="modal fade" id="borrowQR-modal" tabindex="-1" role="dialog" aria-labelledby="borrowQR-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowQR-modal">Add a New Book</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <head>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            </head>
            <body>
            <style>
                main {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #reader {
                    width: 600px;
                }
                #result {
                    text-align: center;
                    font-size: 1.5rem;
                }
            </style>

            <main>
                <div id="reader"></div>
                <div id="result"></div>
            </main>


            <script>

                const scanner = new Html5QrcodeScanner('reader', {
                    // Scanner will be initialized in DOM inside element with id of 'reader'
                    qrbox: {
                        width: 250,
                        height: 250,
                    },  // Sets dimensions of scanning box (set relative to reader element width)
                    fps: 20, // Frames per second to attempt a scan
                    color: "green"
                });


                scanner.render(success, error);
                // Starts scanner

                function success(result) {

                    document.getElementById('result').innerHTML = `
                    <h2>Success!</h2>
                    <p><a href="${result}">${result}</a></p>
                    `;
                    // Prints result as a link inside result element

                    // scanner.clear();
                    // Clears scanning instance

                    // document.getElementById('reader').remove();
                    // Removes reader element from DOM since no longer needed

                }

                function error(err) {
                    console.error(err);
                    // Prints any errors to the console
                }

            </script>
            </body>
        </div>
    </div>
</div>
