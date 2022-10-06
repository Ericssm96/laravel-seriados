<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store']);

Route::post('/series/destroy', SeriesController::class);

/*Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
});
foi possível substituir pelo Route::resource, pois não usamos mais o link no resto do nosso projeto (tanto nos redirecionamentos, quanto na action do form, etc), ao invés disso
usamos o nome do link, que nesse exemplo especificamos, mas já é fornecido automaticamente pelo método "resource"*/


