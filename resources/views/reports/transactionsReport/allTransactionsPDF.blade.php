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
	<span class="align-center"><h3>ALL TRANSACTIONS REPORT</h3></span>
	<h4>Transactions</h4>
    <table cellspacing="0" width="700px">
        <tr class="bordered-row">
            <td class="align-center" style="width: 150px"><p>User</p></td>
            <td class="align-center" style="width: 200px"><p>Book Title</p></td>
            <td class="align-center" style="width: 100px"><p>Date Borrowed</p></td>
            <td class="align-center" style="width: 100px"><p>Due Date</p></td>
            <td class="align-center" style="width: 100px"><p>Date Returned</p></td>
        </tr>
        @foreach($transactions as $transaction)
            <tr class="bordered-row">
                <td class="bordered-data align-center"><p>{{$transaction->user->name}}</p></td>
                <td class="bordered-data align-center"><p>{{$transaction->book->title}}</p></td>
                <td class="bordered-data align-center"><p>{{$transaction->date_borrowed}}</p></td>
                <td class="bordered-data align-center"><p>{{$transaction->due_date}}</p></td>
                <td class="bordered-data align-center"><p>{{$transaction->date_returned ?? 'Not Returned'}}</p></td>
            </tr>
        @endforeach
    </table>

	<!-- Logs Table -->
    <h4>Logs</h4>
    <table cellspacing="0" width="700px">
        <tr class="bordered-row">
            <td class="align-center" style="width: 150px"><p>User</p></td>
            <td class="align-center" style="width: 300px"><p>Action Done</p></td>
            <td class="align-center" style="width: 150px"><p>Date and Time</p></td>
        </tr>
        @foreach($logs as $log)
            <tr class="bordered-row">
                <td class="bordered-data align-center"><p>{{$log->user_name}}</p></td>
                <td class="bordered-data align-center"><p>{{$log->action_done}}</p></td>
                <td class="bordered-data align-center"><p>{{$log->date_done}} {{$log->time_done}}</p></td>
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
