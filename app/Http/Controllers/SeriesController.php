<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome', 'desc')->get();

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nomeSerie = $request->input('nome');
        // dá na mesma que a linha abaixo
        // $nomeSerie = $request->nome;

        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();
        // tudo isso pode ser feito de forma resumida:

        Serie::create($request->all());

        //return redirect(route('series.index'));
        //return redirect()->route('series.index');
        return to_route('series.index'); // as 3 opções dão na mesma
    }
}
