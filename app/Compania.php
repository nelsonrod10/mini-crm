<?php

namespace App;

use App\Empleado;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'correo',
        'logo',
        'pagina_web',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class,'compania_id');
    }
}
