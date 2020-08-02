<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Cliente
 * @package App\Models\Admin
 * @version April 29, 2020, 11:40 am -03
 *
 * @property string $nome
 * @property string $fone
 * @property string $email
 * @property string $obs
 */
class Cliente extends Model
{

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nome',
        'fone',
        'email',
        'obs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'fone' => 'string',
        'email' => 'string',
        'obs' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'fone' => 'required',
        'email' => 'required'
    ];

    
}
