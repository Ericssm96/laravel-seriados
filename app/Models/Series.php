<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Series extends Model
{
    use HasFactory;

    protected $table = 'series'; // O Eloquent já busca uma tabela com o nome da classe em plural e letras maiúsculas no banco de dados, mas para deixar mais claro, preferi inserir explicitamente.
    protected $fillable = ['nome']; // Dessa forma, quando fizermos a criação de uma linha por meio do método estático "create", apenas as colunas que tiverem especificadas no array serão preenchidas com as informações.

    // \/ Essa é a forma que é criada uma relação entre uma tabela e outra usando o Eloquent ORM. Nesse caso usamos o nome
    // "seasons" pois é assim que desejamos chamar a relação entre a série e suas temporadas (esse poderia ser qualquer
    // outro nome.
    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id', 'id'); // dessa forma explicitamos que o Eloquent deve relacionar
        // essa tabela com a tabela seasons fazendo com que a chave estrangeira da tabela seasons tenha o nome de "series_id" e aponte para nossa coluna "id"
        // nessa tabela (Serie). Apesar de fazermos isso, não é necessário, pois o Eloquent já relacionará automaticamente por via de nossa primary key nessa tabela
        // que por padrão se chama id.
    }

    public static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
           $queryBuilder->orderBy('nome');
        });
    }

}
