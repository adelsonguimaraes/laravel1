<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // definindo o nome da tabela
    // se não adicionar assume que o nome é 
    // o mesmo do model no plural
    // protected $table = 'tarefas';
    // protected $primayKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'int';

    // desabilitando created_at, updated_at
    public $timestamps = false;

    // setando os campos que podem ser alterados em massa
    protected $fillable = [ 'titulo' ];

    // configurando como são chamados os itens de data
    // const CREATED_AT = 'data_cadastro';
    // const UPDATED_AT = 'data_atualização';

}
