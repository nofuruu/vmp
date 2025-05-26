<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreModel;

class UserController extends Controller
{
    protected $genre;

    public function __construct()
    {
        $this->genre = GenreModel::all();
    }
    public function dashboard()
    {
        return view(
            'dashboard.index',
            [
                'genres' => $this->genre,
            ]
        );
    }

    public function msmusic()
    {
        return view('masters.musics.index');
    }
}
