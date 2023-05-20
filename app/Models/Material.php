<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['costo', 'cantidadMaterial', 'tipoMaterial', 'provedor_id'];

    public function provedor()
    {
        return $this->belongsTo(Provedor::class);
    }

    public function prendas()
    {
        return $this->belongsToMany(Prenda::class);
    }
}