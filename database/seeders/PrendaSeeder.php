<?php

namespace Database\Seeders;


use App\Models\Prenda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class PrendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('prendas')->insert([   //seeder
        'tipo' => 'pantalon' ,
        'color' => 'rojo',
        'talla' => 5,
        'costo' => 3,
       ]);

       DB::table('prendas')->insert([
        'tipo' => 'blusa' ,
        'color' => 'rosa',
        'talla' => 2,
        'costo' => 2,
       ]);

       $prenda = new Prenda();
       $prenda->tipo = 'Falda';
       $prenda->color = 'azul';
       $prenda->talla = 1;
       $prenda->costo = 1;
       $prenda->save(); 



      Prenda::factory(1)->create(); //factory implementado para prendas

    
    }

}