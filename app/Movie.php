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

    public static function search($title, $take, $skip) {
        return Movie::where('title', 'like', "%title%")->skip($skip)->take($take)->get();
        //paginacija sa skip() i take()
        //`take` označava koliko filmova je potrebno vratiti
        //`skip` označava od kog filma počinje brojanje filmova koje treba vratiti
    }
}
