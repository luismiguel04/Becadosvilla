<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Becado
 *
 * @property $id
 * @property $nombre
 * @property $ApellidoP
 * @property $ApellidoM
 * @property $fecha
 * @property $LugarN
 * @property $DireccionP
 * @property $DireccionA
 * @property $TelefonoC
 * @property $Correo
 * @property $NombreP
 * @property $NombreM
 * @property $NumHermanos
 * @property $LugarFam
 * @property $AnoEntradaVilla
 * @property $AnoGradSec
 * @property $AnoGradBach
 * @property $TrabajoAct
 * @property $Facebook
 * @property $Instagram
 * @property $OtraRed
 * @property $Carrera
 * @property $Universidad
 * @property $DireccionUni
 * @property $Duracion
 * @property $Banco
 * @property $CuentaBanc
 * @property $Sistema
 * @property $Anoiniciobeca
 * @property $AnodeGraduacion
 * @property $FechadeBaja
 * @property $Logros_recibidos
 * @property $status
 * @property $Foto_path
 * @property $programa_id
 * @property $servicio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Programa $programa
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Becado extends Model
{

	static $rules = [
		'nombre' => 'required',
		'ApellidoP' => 'required',
		'ApellidoM' => 'required',
		'fecha' => 'required',
		'LugarN' => 'required',
		'DireccionP' => 'required',
		'DireccionA' => 'required',
		'TelefonoC' => 'required',
		'Correo' => 'required',
		'NombreP' => 'required',
		'NombreM' => 'required',
		'NumHermanos' => 'required',
		'LugarFam' => 'required',
		'AnoEntradaVilla' => 'required',
		'AnoGradSec' => 'required',
		'AnoGradBach' => 'required',
		'TrabajoAct' => 'required',
		'Facebook' => 'required',
		'Instagram' => 'required',
		'Carrera' => 'required',
		'Universidad' => 'required',
		'DireccionUni' => 'required',
		'Duracion' => 'required',
		'Banco' => 'required',
		'CuentaBanc' => 'required',
		'Sistema' => 'required',
		'Anoiniciobeca' => 'required',
		'ContactoEmergencia' => 'required',
		'TelefonoEmergencia' => 'required',
		'status' => 'required',
		'programa_id' => 'required',
		'servicio_id' => 'required',
	];

	protected $perPage = 20;

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'ApellidoP', 'ApellidoM', 'fecha', 'Edad', 'LugarN', 'DireccionP', 'DireccionA', 'TelefonoC', 'Correo', 'NombreP', 'NombreM', 'NumHermanos', 'LugarFam', 'AnoEntradaVilla', 'AnoGradSec', 'AnoGradBach', 'TrabajoAct', 'Facebook', 'Instagram', 'OtraRed', 'Carrera', 'Universidad', 'DireccionUni', 'Duracion', 'Banco', 'CuentaBanc', 'Sistema', 'ContactoEmergencia', 'TelefonoEmergencia', 'Anoiniciobeca', 'AnodeGraduacion', 'FechadeBaja', 'Logros_recibidos', 'status', 'Foto_path', 'programa_id', 'servicio_id'];




	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function programa()
	{
		return $this->hasOne('App\Models\Programa', 'id', 'programa_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function servicio()
	{
		return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
	}

	public function documentos()
	{
		return $this->hasMany('App\Models\documentos', 'becado_id', 'id');
	}
	public function Detallegasto()
	{
		return $this->hasMany('App\Models\detallegasto', 'becado_id', 'id');
	}
}
