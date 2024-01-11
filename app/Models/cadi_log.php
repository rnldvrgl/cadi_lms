<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadi_log extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $casts = [
        'user_name',
        'action_done',
        'date_done',
        'time_done'
    ];

    protected $fillable = [
        'user_name',
        'action_done',
        'date_done',
        'time_done'
        

    ];
}
