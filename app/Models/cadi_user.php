<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadi_user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        'name' => 'string',
        'uname' =>'string',
        'email'=> 'string',
        'pword'=> 'string',
        'grade'=> 'string',
        'section'=> 'string',
        'idOfStudentToBan' => 'string',
        'NameOfStudentToArchive' => 'string',
        'idOfStudentToArchive' =>'string'
    ];

    protected $fillable = [
        'name',
        'uname',
        'email',
        'pword',
        'grade',
        'section',
        'usertype',
        'is_active',
        'is_banned',
        'is_archived',
        'is_verified',
        'last_login'

    ];
}
