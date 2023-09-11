<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{

    static $rules = [

        'Foto_path' =>  'required',
        'becado_id' => 'required',
    ];
    protected $casts = [
        'Foto_path' => 'array'
    ];
    protected $attributes = [
        'Foto_path' => '[]'
    ];

    protected $fillable = ['Foto_path', 'becado_id'];

    public function becado()
    {
        return $this->hasOne('App\Models\Becados', 'id', 'becado_id');
    }
}
