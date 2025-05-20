<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'genreid';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
}
