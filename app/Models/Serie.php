<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series'; // O Eloquent já busca uma tabela com o nome da classe em plural e letras maiúsculas no banco de dados, mas para deixar mais claro, preferi inserir explicitamente.
    protected $fillable = ['nome']; // Dessa forma, quando fizermos a criação de uma linha por meio do método estático "create", apenas as colunas que tiverem especificadas no array serão preenchidas com as informações.

    // \/ Essa é a forma que é criada uma relação entre uma tabela e outra usando o Eloquent ORM. Nesse caso usamos o nome
    // "temporada" pois é assim que desejamos chamar a relação entre a série e suas temporadas (esse poderia ser qualquer
    // outro nome.
    public function temporada()
    {
        return $this->hasMany(Season::class);
    }

}
