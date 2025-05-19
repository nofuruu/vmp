<?php

namespace App\Http\Controllers;

class MusicController extends Controller
{
    public function index()
    {
        return view('msmusic.index');
    }

    public function add()
    {
        return view('msmusic.add-music');
    }
}
