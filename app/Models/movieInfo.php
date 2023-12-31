<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movieInfo extends Model
{
    use HasFactory;

    protected $table = "movies";
    protected $primarykey = 'movieID';
    public $timestamps = false;
    protected $fillable = [
        'movieTitle',
        'movieDescription',
        'movieDate',
        'movieGenre',
        'moviePhoto',
    ];

}
