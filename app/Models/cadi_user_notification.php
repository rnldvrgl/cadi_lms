<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadi_user_notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $casts = [
        'user_id',
        'notif_message',
        'date_created',
        'time_Created',
        'notif_title',
        'notif_redirect'

    ];

    protected $fillable = [
        'user_id'

    ];
}
