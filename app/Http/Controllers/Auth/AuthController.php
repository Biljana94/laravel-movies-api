<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct() {
        //authenticate middleware primenjujemo na sve metode sem na login
        //middleware da korisnik mora biti autentifikovan
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request) {
        // u $credentials stavljamo samo email i password od Usera koji on salje putem $request-a
        $credentials = $request->only([ 'email', 'password' ]);
        $token = auth()->attempt($credentials); //generisemo $token za email i password koji smo dobili preko $request-a u $credentials var

        //ako nema tokena
        if(!$token) {
            return response()->json([ //vrati mi json
                'message' => 'You are not authorized!' //poruku da korisnik nije autorizovan
            ], 401); //drugi parametar je 401(not authorized)
        }

        return response()->json([
            'token' => $token,
            'type' => 'bearer', //tip tokena koji smo kreirali za svakog korisnika
            'expires_in' => auth()->factory()->getTTL() * 60, //definisemo kad nam token istice za autentifikovanog korisnika
            'user' => auth()->user(), //vracamo usera sa njegovim podacima, da ne bi morali da pravimo novi request za ulogovanog korisnika
        ]);
    }
}
