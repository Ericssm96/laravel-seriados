<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series'; // O Eloquent já busca uma tabela com o nome da classe em plural e letras maiúsculas no banco de dados, mas para deixar mais claro, preferi inserir explicitamente.
    protected $fillable = ['nome']; // Dessa forma, quando fizermos a criação de uma linha por meio do método estático "create", apenas as colunas que tiverem especificadas no array serão preenchidas com as informações.

}
