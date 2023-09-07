<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasto
 *
 * @property $id
 * @property $Monto
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 * @property $becado_id
 * @property $fecha
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gasto extends Model
{

  static $rules = [

    'fecha' => 'required',
  ];



  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['fecha'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */

  public function Gasto()
  {
    return $this->hasMany('App\Models\detallegasto', 'gasto_id', 'id');
  }
}
