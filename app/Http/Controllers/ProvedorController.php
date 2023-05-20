<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use App\Models\Material;
use Illuminate\Http\Request;

class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $provedor = Provedor::all();
        return view('provedor.index-provedor', compact('provedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('provedor.create-provedor',);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombreP' => 'required|min:5|max:255',
            'direccion' => 'required|min:4|max:255',
            'telefono' => 'required|integer|max:9999999999',
        ]);
        
        session()->flash('success', 'El proveedor se ha registrado exitosamente.');

        Provedor::create($request->all()); //Ingresa los datos a las columnas que esten definidas en los FILLABLE

        return redirect()->route('provedor.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Provedor $provedor)
    {
        //
        $materiales = Material::where('provedor_id', $provedor->id)->get();
                
        return view('provedor.show-provedor', compact('provedor', 'materiales'));
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provedor $provedor)
    {
        //
        return view('provedor.edit-provedor', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provedor $provedor)
    {
        //
        $request->validate([
            'nombreP' => 'required|min:5|max:255',
            'direccion' => 'required|min:4|max:255',
            'telefono' => 'required|integer|max:9999999999',
        ]);
        session()->flash('success', 'El proveedor se ha actualizado exitosamente.');

        Provedor::where('id', $provedor->id)->update($request->except('_token', '_method'));

        return redirect()->route('provedor.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provedor $provedor)
    {
        //
        $provedor->delete();
        return redirect()->route('provedor.index')->with('prenda', 'eliminado');
    }
}