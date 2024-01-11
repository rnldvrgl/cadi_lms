<?php
use Carbon\Carbon;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <div class="watermark"> <img src="img/MCHS_LOGO.png" height="300px"> MCHS</div>
    <div class="reset-watermark"> </div>
    <title>{{$title}}</title>

</head>
<body>
    <table width="690px" cellspacing="0">
        <tr>
            <td width="5px">
                <div>
                    <img src="img/MCHS_LOGO.png" height="50px">
                </div>
            </td>
            <td  colspan="3">
                <div>
                    <h2>Mabalacat <br>Community <br>High School</h2>
                </div>
            </td>
            <td width="150px">
                    <p>Report ID: {{$ReportId}}</p>
                    <p>Date: <?php echo Carbon::now('Asia/Manila')->format("Y-m-d") ?></p>
                    <p>Time: <?php echo Carbon::now('Asia/Manila')->format("H:i:s") ?></p>
            </td>

        </tr>
    </table>
    <span class="align-center"><h3>BOOK BORROW AND RETURN LOG REPORT</h3></span>
    <table cellspacing="0" width="700px">
        <tr class="bordered-row" style="vertical-align: bottom;" >
            <td class="align-center" style="width: fit-content"><p>Process ID</p></td>
            <td class="align-center" style="width: fit-content"><p>Student Name</p></td>
            <td class="align-center" style="width: fit-content"><p>Book Title</p></td>
            <td class="align-center" style="width: fit-content"><p>Date Borrowed</p></td>
            <td class="align-center" style="width: fit-content"><p>Due Date</p></td>
            <td class="align-center" style="width: fit-content"><p>Return Date<br><small style="font-size: 10px">(If there's none it is not yet returned)</small></p></td>
        </tr>
{{--        {{ddd($logs->user_name)}}--}}
        @foreach($borrow_logs as $borrow_log)
            <tr class="bordered-row">
                <td class="bordered-data align-center"><p>{{$borrow_log->process_id}}</p></td>
                <td class="bordered-data align-center"><p>{{$borrow_log->name}}</p></td>
                <td class="bordered-data align-center"><p>{{$borrow_log->title}}</p></td>
                <td class="bordered-data align-center"><p>{{$borrow_log->date_borrowed}}</p></td>
                <td class="bordered-data align-center"><p style="color:{{($borrow_log->due_date < date('Y-m-d') && $borrow_log->return_date=="")? "red": "black"}}">{{$borrow_log->due_date}}</p></td>
                <td class="bordered-data align-center"><p>{{$borrow_log->return_date}}</p></td>
            </tr>
        @endforeach
    </table>
    <span><p2 style="font-style: oblique;">{{$footer}}</p2></span>

</body>
<style>
    td {
    }
    .align-center{
        text-align: center;
    }
    h2, h3, p2, td{
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
    }
    .watermark {
        position: fixed;
        top: 250px;
        left: 40px;
        width: 200px;
        height: 200px;
        opacity: .1;
        font-size: 196px;
        font-weight: bold;
        /*transform: rotate(-45deg); !* Rotate the text if desired *!*/

    }

    .reset-watermark {
        position: fixed;
        opacity: 1.0;
    }

    @media print {
        .reset-watermark {
            display: none;
        }
    }
    .bordered-row{
        border-collapse: collapse;
    }
    .bordered-data{
        border: 1px solid #000;
        width: 50%;
        font-size: 11px;
    }
    #header{
        border: #1b1e21;
        display: flex;
        flex-direction: row;
    }

    #logo-container{
        margin: 20px;
        display: flex; /* This sets up a flex container */
        align-items: center; /* Vertically align items in the center */

    }

    #report-details{
        margin-right: 10px; /* Optional margin between the two divs */
    }
    #table-footer{
        display: flex;
    }
    .align-right{
        text-align: end
    }

</style>

</html>
