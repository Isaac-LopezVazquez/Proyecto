<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = Archivo::all();
        return view('archivo.index',compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos');
         //    crear registro en tabla archivos
            $archivos=new Archivo();
            $archivos->hash = $ruta;
            $archivos->nombre=$request->archivo->getClientOriginalName();
            $archivos->extension=$request->archivo->guessExtension();
            $archivos->mime=$request->archivo->getMimeType();
            $archivos->save();
         }
         session()->flash('succes', 'El archivo se ha creado exitosamente.');
         return redirect()->route('archivo.index');
    }

    /**
     * Display the specified resource.
     */

     public function descargar(Archivo $archivo)
     {
        
        if (! Gate::allows('descargar-archivos')) { //gate para elimninar
            abort(403);
        }

         return Storage::download($archivo->hash, $archivo->nombre, 
                 ['Content-Type' => $archivo->mime]);
         
     }
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        if (! Gate::allows('eliminar-archivos')) { //gate para elimninar
            abort(403);
        }


        Storage::delete($archivo->hash);

        $archivo->delete();



        return redirect()->route('archivo.index')->with('archivo', 'eliminado');
    }

    }
    

