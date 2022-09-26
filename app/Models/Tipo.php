<?php

namespace App\Models;
//Na aplicação é excluido com o uso do SoftDeletes, mas não no banco
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos';
    /*Declarar chave primaria*/
    protected $primaryKey = 'id_tipo';
    protected $dates = ['created_at','updated_at','deleted_at'];
    //Campos que irá conseguir acessar via Formulário
    protected $fillable = ['tipo'];
    
}
