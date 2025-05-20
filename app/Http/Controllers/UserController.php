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
        $albums = [
            [
                'image' => '/assets/images/HistoryOfBadDecisions_NeckDeep.jpeg',
                'title' => 'History of Bad Decisions',
                'artist' => 'Neck Deep',
                'src' => '/assets/music/Neck Deep - I Hope This Comes Back To Haunt You.mp3'
            ],
            [
                'image' => '/assets/images/RainInJuly_NeckDeep.jpeg',
                'title' => 'Rain In July',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/LifeNotOutToGetYou_NeckDeep.jpeg',
                'title' => 'Life’s Not Out to Get You',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/ThePeaceandThePanic_NeckDeep.jpeg',
                'title' => 'The Peace and The Panic',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/ThePeaceandTheBsides.jpeg',
                'title' => 'The Peace and The B-Sides',
                'artist' => 'Neck Deep'
            ],
        ];

        $albums2 = [
            [
                'image' => '/assets/images/HistoryOfBadDecisions_NeckDeep.jpeg',
                'title' => 'History of Bad Decisions',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/RainInJuly_NeckDeep.jpeg',
                'title' => 'Rain In July',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/LifeNotOutToGetYou_NeckDeep.jpeg',
                'title' => 'Life’s Not Out to Get You',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/ThePeaceandThePanic_NeckDeep.jpeg',
                'title' => 'The Peace and The Panic',
                'artist' => 'Neck Deep'
            ],
            [
                'image' => '/assets/images/ThePeaceandTheBsides.jpeg',
                'title' => 'The Peace and The B-Sides',
                'artist' => 'Neck Deep'
            ],
        ];
        return view(
            'dashboard.index',
            [
                'albums' => $albums,
                'albums2' => $albums2,
                'genres' => $this->genre,
            ]
        );
    }

    public function msmusic()
    {
        return view('masters.musics.index');
    }
}
