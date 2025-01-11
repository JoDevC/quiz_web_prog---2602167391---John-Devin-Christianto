<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $dates = ['publish_date'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
