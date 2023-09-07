<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Becado[] $becados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function becados()
    {
        return $this->hasMany('App\Models\Becado', 'servicio_id', 'id');
    }
    

}
