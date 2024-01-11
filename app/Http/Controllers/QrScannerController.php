<?php

namespace App\Http\Controllers;

use App\Models\cadi_all_notification;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QrScannerController extends Controller
{
    //
    public function show()
    {
        return view('QrCode/qr_scanner');
    }
    public function showQrBorrowReader(){

        return view('QrCode/Qr-Reader_borrow');

    }
}
