<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallegasto
 *
 * @property $id
 * @property $becado_id
 * @property $Monto
 * @property $gasto_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Becado $becado
 * @property Gasto $gasto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detallegasto extends Model
{

    static $rules = [
        'becado_id' => 'required',
        'Monto' => 'required',
        'gasto_id' => 'required',
    ];
    protected $casts = [
        'becado_id' => 'array',
        'Monto' => 'array'
    ];
    protected $attributes = [
        'becado_id' => '[]',
        'Monto' => '[]'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['becado_id', 'Monto', 'gasto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function becado()
    {
        return $this->hasOne('App\Models\Becado', 'id', 'becado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gasto()
    {
        return $this->hasOne('App\Models\Gasto', 'id', 'gasto_id');
    }
}
