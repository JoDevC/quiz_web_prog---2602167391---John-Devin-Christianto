<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $dates = ['publish_date'];

    protected $fillable = ['genre_id','name','description','photo','publish_date'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
