<?php

namespace App\Http\Controllers;

use App\Http\Requests\Furniture\StoreRequest;
use App\Http\Requests\Furniture\UpdateRequest;
use App\Models\Furniture;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FurnitureController extends Controller
{
    //
    public function index()
    {
        // Mostrar una lista de muebles
        try{
            $furniture = Furniture::all();

            return view('Furnitures/furnitureindex', compact('furniture'));

        } catch(\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo mueble retornar vista
        return view('Furnitures/furniturecreate');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $furniture = Furniture::create($request->all());

            if (!$furniture->exists) {
                throw new Exception('Error al guardar el mueble');
            }

            DB::commit();
            // return redirect()->back()->with('success','Guardado exitosamente');
            return redirect()->route('Furnitures/furnitureshow', $furniture->id)->with('success', 'Mueble creado exitosamente');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    
    public function show(string $furnitureId)
    {
        // muestra uno de los registros de la base de datos (con el id)
        try {
            $furniture = Furniture::findOrFail($furnitureId);

            return view('Furnitures/furnitureshow', compact("furniture"));
            // return $furniture;
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }

    public function edit($id)
    {
        // Mostrar el formulario para editar un mueble existente
        try {
            $furniture = Furniture::findOrFail($id);

            return view('Furnitures/furnitureedit', compact("furniture"));
            // return $furniture;
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }

    public function update(UpdateRequest $request, $id)
    {
            // Actualizar un mueble existente en la base de datos
        try {
            DB::beginTransaction();

            $furniture = Furniture::find($id)->update($request->all());

            DB::commit();

            return redirect()->route('furniture.index')->with('success', 'Mueble actualizado exitosamente');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(string $furnitureId)
    {
        // Eliminar un mueble de la base de datos
        try {
            $furniture = Furniture::findOrFail($furnitureId);

            $furniture->delete();

            return redirect()->route('Furnitures/furnitureindex')->with('success', 'Mueble eliminado exitosamente');
        } catch (\Exception $exception){
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
