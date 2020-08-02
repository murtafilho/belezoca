<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Eloquent as Model;

class Hospedagem extends Model
{

    public $table = 'hospedagens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'pet_id',
        'obs',
        'preco_dia',
        'data_entrada',
        'data_saida',
        'horario',
        'status_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'pet_id' => 'integer',
        'obs' => 'string',
        'preco_dia' => 'float',
        'data_entrada' => 'date',
        'data_saida' => 'date',
        'horario' => 'time',
        'status_id' => 'integer'
    ];

    public static $rules = [
        'pet_id' => 'required:integer',
        'preco_dia' => 'required:float',
        'data_entrada' => 'required:date',
        'data_saida' => 'required:date',
        'horario' => 'required:time',
        'status_id' => 'required:integer'
    ];


    public function pet()
    {
        return $this->belongsTo(\App\Models\Admin\Pet::class, 'pet_id');
    }

    public function getPrecoDiariaAttribute(){
        return number_format($this->preco_dia, 2);
    }

    public function status(){
        return $this->belongsTo(\App\Models\Admin\Status::class, 'status_id');
    }

    public function getNumdiasAttribute(){
        $start_date = $this->data_entrada;
        $end_date = $this->data_saida;
        return $start_date->diffInDays($end_date);
        /*
        $d1=date_create($this->data_entrada);
        $d2=date_create($this->data_saida);
        $diff =  date_diff($d1,$d2,true);
        return $diff->format('%d');
        */
    }

    public function getTotalAttribute(){
        $n = (float) $this->getNumdiasAttribute() * $this->preco_dia;
        return number_format($n, 2);
    }

    public function scopeAtuais($query){
        return $query->where('data_saida','>=',Carbon::now()->format('Y-m-d'));
    }


}
