<?php

namespace App\Models;
//Na aplicação é excluido com o uso do SoftDeletes, mas não no banco
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//PARA RELACIONAMENTOS IMPORTAR MODELS
/*MODEL*/
use App\Models\{Tipo};

class CentroCusto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'centro_custos';
    protected $primaryKey = 'id_centro_custo';
    protected $dates = ['created_at','updated_at','deleted_at'];
    //Campos que irá conseguir acessar via Formulário
    protected $fillable = ['id_tipo','centro_custo'];

    /*
     *   Relacionamentos     *
     *   https://laravel.com/docs/9.x/eloquent-relationships#main-content
    */

    /**
     * Retornar o tipo do centro de custos
     * 19/09/2022
     * @return object
     */

    public function tipo(){
        return $this->belongsTo(Tipo::class, 'id_tipo','id_tipo');
    }
}
