<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //
    public function show($book_id, $book_title)
    {
        $qr_value = '{"value1":"'.$book_id.'", "value2":"'.$book_title.'"}';
        $qrCode = QrCode::size(200)
//            ->style('dot')
            ->eye('circle')
            ->color(18, 37, 69)
            ->margin(1)
            ->generate(
               $qr_value
            );
        return response($qrCode);




//        $logo = 'img/MCHS_LOGO.png';
//        $QrCodeWithLogo = QrCode::format('png')
//            ->merge($logo, .3, true)
//            ->size(200)
//            ->generate(
//                $qr_value
//            );
//        return $QrCodeWithLogo->header('Content-type','image/png');

//        return view('QrCode.Qr-Generator',[
//            'QrCode' => $qrCode
//        ]);
    }


}
