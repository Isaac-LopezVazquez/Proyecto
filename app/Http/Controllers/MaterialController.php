<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Provedor;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();
        return view('material.index-material', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provedores = Provedor::all();
        return view('material.create-material', compact('provedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cantidadMaterial' => 'required|integer|max:1000',
            'tipoMaterial' => 'required|min:4|max:255',
            'costo' => 'required|integer|max:1000',
        ]);
        session()->flash('success', 'El material se ha registrado exitosamente.');

        $request->merge(['provedor_id' => $request->provedor_id]);

        Material::create($request->all());
     

        return redirect()->route('material.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('material.show-material', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('material.edit-material', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'cantidadMaterial' => 'required|integer|max:1000',
            'tipoMaterial' => 'required|min:4|max:255',
            'costo' => 'required|integer|max:1000',
        ]);
        session()->flash('success', 'El material se ha actualizado exitosamente.');
        Material::where('id', $material->id)->update($request->except('_token', '_method'));

        return redirect()->route('material.index');
        //
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('material.index')->with('material', 'eliminado');
    }
}
