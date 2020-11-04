<?php

namespace App;

use App\Compania;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compania_id',
        'primer_nombre',
        'apellido',
        'correo',
        'telefono',
    ];

    public function compania()
    {
        return $this->belongsTo(Compania::class,'compania_id');
    }
}
