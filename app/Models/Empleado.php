<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['nombre', 'apellidoP', 'apellidoM', 'salario', 'rfc', 'telefono']; //Declaramos las columnas que el usuario vaya a modificar

    public function prendas()
    {
        return $this->hasMany(Prenda::class);
    }
}