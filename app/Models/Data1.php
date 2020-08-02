<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Data1
 * @package App\Models
 * @version May 15, 2020, 8:50 pm -03
 *
 * @property string|\Carbon\Carbon $data1
 */
class Data1 extends Model
{
    public $timestamps = false;
    public $table = 'data1';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getDateBRAttribute($date){

        dd($date);

    }


    public $fillable = [
        'data1'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
