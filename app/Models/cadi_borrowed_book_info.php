<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cadi_borrowed_book_info extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $casts = [
        'book_id' => 'int',
        'user_id' => 'int',
        'process_id' => 'int',
        'return_book_id' =>'int',
        'return_user_id' => 'int',
    ];

    protected $fillable = [
        'id',
        'book_id',
        'user_id',
        'process_id',
        'return_date',
        'is_returned'
    ];
    protected $primaryKey = 'process_id';
    public function user()
    {
        return $this->belongsTo(cadi_user::class, 'user_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(cadi_book::class, 'book_id', 'id');
    }

}
