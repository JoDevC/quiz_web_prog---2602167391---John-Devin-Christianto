<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    public function movies(){
        return $this->hasMany(Movie::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
