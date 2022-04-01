<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartoon extends Model
{
    use HasFactory;

    public function studio() {
        return $this->belongsTo(Studio::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    public function getFullUrlAttribute() {
        return '/' . $this->url;
    }

    public function similar() {
        $genreIds = $this->genres->pluck('id');
        $cartoons = self::whereHas('genres', function($q) use($genreIds) {
            $q->whereIn('genre_id', $genreIds);
        })->where('id', "!=", $this->id)->limit(4)->get();
        return $cartoons;
    }

}
