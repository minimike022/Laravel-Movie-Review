<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    

    protected $table = 'user_info';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'First_Name',
        'Last_Name',
        'Middle_Name',
        'Gender',
        'birthdate',
        'address',
    ];
}
