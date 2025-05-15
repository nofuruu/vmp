<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $albums = [
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
        return view('dashboard.index', compact('albums'));
    }
}
