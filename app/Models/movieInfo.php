<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movieInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'movieID',
        'movieTitle',
        'movieDescription',
        'movieReleaseDate',
        'movieGenre',



    ];
}
