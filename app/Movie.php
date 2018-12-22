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

    //ovu metodu smo koristili u MoviesController.php
    //staticka je fnc jer pristupamo celom modelu Movie.php, i da u kontroleru mogu da pristupim samo toj akciji
    //treba nam za celu klasu
    public static function search($title, $take, $skip) {
        return self::where('title', 'like', "%title%")->take($take)->skip($skip)->latest()->get();
        //paginacija sa skip() i take()
        //`take` označava koliko filmova je potrebno vratiti
        //`skip` označava od kog filma počinje brojanje filmova koje treba vratiti
    }
}
