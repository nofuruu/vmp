<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;

class MusicController extends Controller
{
    protected $genre;

    public function __construct()
    {
        $this->genre = GenreModel::all();
    }
    public function index()
    {
        return view('msmusic.index', [
            'genres' => $this->genre,
        ]);
    }

    public function add()
    {
        return view('msmusic.add-music', [
            'genre' => $this->genre,
        ]);
    }
}
