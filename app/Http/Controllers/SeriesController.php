<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome', 'desc')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        // $request->session()->forget('mensagem.sucesso'); não é mais necessário pois foi usado o método "flash" da session ao invés do "put"

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        /*$request->validate([
            'nome' => ['required', 'min:2']  da na mesma que 'nome' => 'required|min:2'
        ]);
        /\ foi descartado pois como temos 2 tipos de requisição de entrada no nosso formulário (criar e editar série)
        é mais recomendado colocar a regra de entrada num lugar que funcione para ambas as situações, e por isso extendemos
        a classe de Request do Laravel criando a nossa própria request para fazer a regra de entrada já nela, eliminando
        a necessidad de fazer a validação da regra em todo método que vá processar uma requisição do tipo "post" ou "put"
        */
        // $nomeSerie = $request->input('nome');
        // dá na mesma que a linha abaixo
        // $nomeSerie = $request->nome;

        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();
        // tudo isso pode ser feito de forma resumida:

        $serie = Serie::create($request->all());
        //$request->session()->flash('mensagem.sucesso', "Série \"$serie->nome\" adicionada com sucesso."); trocada pela opção de inserir uma flash message direto no redirecionamento com o método "with" da rota.

        //return redirect(route('series.index'));
        //return redirect()->route('series.index');
        return to_route('series.index')->with('mensagem.sucesso', "Série \"$serie->nome\" adicionada com sucesso."); // as 3 opções dão na mesma
    }

    public function destroy(Serie $series): RedirectResponse
    {
        // Para que o modo de acesso ao banco de dados simplificado funcione, precisamos que o parâmetro que representa a entidade (nesse caso, "series") tenha o mesmo nome do query param que estamos acessar.
        // Nesse caso o nome do query param já é dado automaticamente pelo laravel, pois ao usarmos o método "resource" nas rotas, o laravel decide a estrutura da rota baseada no padrão citado aqui: https://laravel.com/docs/9.x/controllers#restful-nested-resources
        // O nome fica "series" ao invés de "serie" porque em inglês "series" já é o singular de "series"
        $series->delete();
        // $request->session()->put('mensagem.sucesso', 'Série removida com sucesso!'); Caso eu use essa opção, tenho que usar o método "forget" da session onde ela a mensagem é usada
        // $request->session()->flash('mensagem.sucesso', "Série $series->nome removida com sucesso!"); trocada pela opção de inserir uma flash message direto no redirecionamento com o método "with" da rota.

        return to_route('series.index')->with('mensagem.sucesso', "Série $series->nome removida com sucesso!");
    }

    public function edit(Serie $series) // mesmo caso do méto
    {
        dd($series->temporada());
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        // $series->nome = $request->nome;
        $series->fill($request->all()); // Dessa forma estamos fazendo mass assignment e inserindo todas as propriedades que vierem como parâmetro da request nas colunas do banco de dados de mesmo nome
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série \"$series->nome\" editada com sucesso!");
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório'
        ];
    }
}
