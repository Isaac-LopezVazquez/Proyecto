<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['tipo', 'color', 'talla', 'costo', 'empleado_id']; //Declaramos las columnas que el usuario vaya a modificar

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function materiales()
    {
        return $this->belongsToMany(Material::class);
    }
}


