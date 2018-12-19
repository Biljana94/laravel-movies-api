<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'director',
        'imageUrl',
        'duration',
        'releaseDate',
        'genre'
    ];

    //ona polja koja hocemo da sakrijemo
    // protected $hidden = [
    //     'created_at'
    // ];

    public static function search($title) {
        return Movie::where('title', 'like', "%title%")->get();
    }
}
