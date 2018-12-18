<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //ako je metoda PUT
        //onda vrati rutu sa parametrom id od movie
        //ako nije put metoda, vrati vrednost 0
        //sve nam je smesteno u $movieId
        $movieId = $this->method() == 'PUT'
                ? $this->route()->parameters['movie']->id
                : null;

        return [
            'title' => 'required',
            'director' => 'required',
            'imageUrl' => 'required',
            'duration' => 'required',
            'releaseDate' => 'required',
            'genre' => 'required',
        ];
    }
}
