<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Pet
 * @package App\Models\Admin
 * @version April 29, 2020, 12:14 pm -03
 *
 * @property integer $cliente_id
 * @property string $nome
 * @property string $raca
 * @property string $sexo
 * @property string $castrado
 * @property string $porte
 * @property string $obs
 * @property string $img
 */
class Pet extends Model
{
    public $table = 'pets';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'cliente_id',
        'nome',
        'raca',
        'sexo',
        'castrado',
        'porte',
        'img',
        'obs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'nome' => 'string',
        'raca' => 'string',
        'sexo' => 'string',
        'castrado' => 'string',
        'porte' => 'string',
        'obs' => 'string',
        'img' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required',
        'nome' => 'required',
        'raca' => 'required',
        'sexo' => 'required',
        'castrado' => 'required',
        'porte' => 'required'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Admin\Cliente');
    }


    public function getDescrAttribute(){
        return '<b>'.strtoupper($this->nome).'</b>'.' - Raça: '.$this->raca.' - Porte: '.$this->porte;
    }

    public function servicos(){
        return $this->hasMany('App\Models\Admin\Servico');
    }
 
}
