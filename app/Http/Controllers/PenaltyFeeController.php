<?php

namespace App\Http\Controllers;

use App\Models\cadi_penalty_amount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenaltyFeeController extends Controller
{
    //
    function addPenaltyFee(Request $request){
        $penalty_data = [
            'user_id'=>$request->input('user_id'),
            'amount'=>12,
            'date_created'=> Carbon::now('Asia/Manila')->format('Y-m-d')
        ];
        cadi_penalty_amount::create($penalty_data);
    }
}
