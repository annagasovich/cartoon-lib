<?php

namespace App\Http\Controllers;

use App\Models\Cartoon;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index($id) {
        $genre = Genre::where('url', $id)->firstOrFail();
        $cartoons = Cartoon::whereHas('genres', function($q) use($genre) {
            $q->where('genre_id', '=', $genre->id);
        })->get();
        return view('listing.genres', ['genre' => $genre, 'items' => $cartoons]);
    }
}
