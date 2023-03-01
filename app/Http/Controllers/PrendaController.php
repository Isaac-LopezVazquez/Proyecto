<?php

namespace App\Http\Controllers;

use App\Models\Prenda;
use Illuminate\Http\Request;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prenda = Prenda::all();
        return view('prenda.index-prenda', compact('prenda')); //vista con listado


    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('prenda.registro-prenda'); //form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tipo'=>'required|min:4|max:255',
            'color'=>'required|min:4|max:255',
            'talla'=>'required|integer|max:40',
            'costo'=>['required','integer','max:999'], 
            
        ]);

        $prenda = new Prenda();
        $prenda -> tipo = $request->tipo;
        $prenda -> color = $request->color;
        $prenda -> talla = $request->talla;
        $prenda -> costo = $request->costo;
        $prenda->save();

        return redirect()->route('prenda.index'); //redireccion a form
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Prenda $prenda)
    {
        //
        return view('prenda.show',compact('prenda'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenda $prenda)
    {
        //
        return view('prenda.editar', compact('prenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prenda $prenda)
    {
        //
       
        $prenda -> tipo = $request->tipo;
        $prenda -> color = $request->color;
        $prenda -> talla = $request->talla;
        $prenda -> costo = $request->costo;
        $prenda->save();
        return redirect()->route('prenda.show', $prenda);
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenda $prenda)
    {
        //
    }
}
