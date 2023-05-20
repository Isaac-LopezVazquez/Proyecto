<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = Empleado::all();
        return view('empleado.index-empleado', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (! Gate::allows('admin-empleados')) { //gate
            abort(403);
        }
        return view('empleado.create-empleado',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|min:5|max:255',
            'apellidoP' => 'required|min:4|max:255',
            'apellidoM' => 'required|min:4|max:255',
            'salario' => 'required|integer|max:50000',
            'rfc' => 'required|min:13|max:255',
            'telefono' => 'required|integer|max:9999999999',
        ]);
        session()->flash('success', 'El empleado se ha registrado exitosamente.');

        Empleado::create($request->all()); //Ingresa los datos a las columnas que esten definidas en los FILLABLE

        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
        $prendas = Prenda::where('empleado_id', $empleado->id)->get();
        return view('empleado.show-empleado', compact('empleado','prendas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
        return view('empleado.edit-empleado', compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $request->validate([
            'nombre' => 'required|min:5|max:255',
            'apellidoP' => 'required|min:4|max:255',
            'apellidoM' => 'required|min:4|max:255',
            'salario' => 'required|integer|max:50000',
            'rfc' => 'required|min:13|max:255',
            'telefono' => 'required|integer|max:9999999999',
        ]);
        session()->flash('success', 'El empleado se ha actualizado exitosamente.');

        Empleado::where('id', $empleado->id)->update($request->except('_method', '_token'));

        return redirect()->route('empleado.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();
        return redirect()->route('empleado.index')->with('empleado', 'eliminado');

    }
}