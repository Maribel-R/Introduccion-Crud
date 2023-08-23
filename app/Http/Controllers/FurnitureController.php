<?php

namespace App\Http\Controllers;

use App\Http\Requests\Furniture\StoreRequest;
use App\Http\Requests\Furniture\UpdateRequest;
use App\Models\Furniture;
use Exception;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    //
    public function index()
    {
        // Mostrar una lista de muebles
        try{
            $brands = Furniture::all();

            return view('furniture');
        } catch(\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }

         // Obtén todos los muebles de la base de datos
        //Manda a create, edit and destroy
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo mueble retornar vista
        return view('Furniture/furniturecreate');
    }

    public function store(StoreRequest $request)
    {
        try{
            // DB::beginTransaction();

            $furniture = Furniture::create($request->all());

            if(! $furniture->exists){
                throw new Exception( 'Error al guardar');
            }

            // DB::commit();
            return redirect()->route('furniture.show', $furniture->id);

            // return redirect()->back()->with('success','Guardado exitosamente');
        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    
    public function show(string $furnitureId)
    {
        // muestra uno de los registros de la base de datos (con el id)
        try {
            $furniture = Furniture::findOrFail($furnitureId);

            return view('furniture.show', compact("furniture"));
            return $furniture;
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }

    public function edit(string $furnitureId)
    {
        // Mostrar el formulario para editar un mueble existente
        try {
            $furniture = Furniture::findOrFail($furnitureId);

            return view('furniture.edit', compact("furniture"));
            return $furniture;
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }

    public function update(UpdateRequest $request, string $furnitureId)
    {
        // Actualizar un mueble existente en la base de datos
        try {
            // DB::beginTransaction();

            $furniture = Furniture::findOrFail($furnitureId);

            $furniture->update($request->all());

            // DB::commit();

            return redirect()->back()->with('success', 'Actualizado con exito');
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }

    public function destroy(string $furnitureId)
    {
        // Eliminar un mueble de la base de datos
        try {
            $furniture = Furniture::findOrFail($furnitureId);

            $furniture->delete();

            return redirect()->back()->with('success', 'Eliminado con exito');
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
