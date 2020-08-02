<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Eloquent as Model;

class Servico extends Model
{

    public $table = 'servicos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = [
        'data_servico'
    ];

    //protected $dateFormat = 'd/m/y';

    public $fillable = [
        'pet_id',
        'tipo',
        'obs',
        'preco',
        'data_servico',
        'horario',
        'status_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'pet_id' => 'integer',
        'tipo' => 'string',
        'obs' => 'string',
        'preco' => 'float',
        'data_servico' => 'date',
        'horario' => 'time',
        'status_id' => 'integer'
    ];

    public static $rules = [
        'pet_id' => 'required:integer',
        'tipo' => 'required',
        'preco' => 'required:float',
        'data_servico' => 'required:date',
        'horario' => 'required:integer',
        'status_id' => 'required:integer'
    ];


    public function pet()
    {
        return $this->belongsTo(\App\Models\Admin\Pet::class, 'pet_id');
    }

    public function getMoedaAttribute(){
        return 'R$ '. number_format($this->preco, 2);
    }

    public function status(){
        return $this->belongsTo(\App\Models\Admin\Status::class, 'status_id');
    }

    public function getDatabrAttribute(){
        return Carbon::parse($this->data_servico)->format('d/m/Y');
    }

    public function getHoraAttribute(){
        return Carbon::parse($this->horario)->format('H:i');
    }

    public function getKey1Attribute(){
        return $this->id;
    }
}
