<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadi_book extends Model
{
    use HasFactory;
//    public $timestamps = false;
    protected $casts = [
        'user_id',
        'date_borrowed',
        'process_id',
        'is_returned',
        'return_date',
        'book_id',
        'book_title',
        'due_date',
        'borrower_id'
    ];

    protected $fillable = [
        'book_id',
        'book_title',
        'due_date',
        'borrower_id'

    ];
    const CREATED_AT = 'date_added';

}
