<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            "Breaking Bad", "Sons of Anarchy", "Peaky Blinders"
        ];

        return view('series.index', [
            'series' => $series,
        ]);
    }
}
