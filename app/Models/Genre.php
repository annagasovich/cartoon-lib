<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function cartoons() {
        return $this->belongsToMany(Cartoon::class);
    }

    public function getFullUrlAttribute() {
        return '/genres/' . $this->url;
    }
}
