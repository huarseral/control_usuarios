<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                    //Instancia de Builder (Eloquent)
        $empleados= Empleados::query()
                        ->select([
                            "id","name","lname","dni","sexo","ciudad","cargo","sueldo","area","activo"
                        ])->latest("id")
                        ->paginate(10); 

        return response()->json($empleados);
        

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
        $data= $request->validate([
            "name"=> "required|string|max:25",
            "lname"=> "required|string|max:35",
            "dni"=> "required|digits:8|unique:empleados,dni",
            "sexo"=> "required|in:femenino,masculino,otro",
            "email"=>"required|string|max:100|unique:empleados,email",
            "ciudad"=> "required|string|max:50",
            "cargo"=> "required|string|max:50",
            "sueldo"=> "required|numeric|min:0|max:9999999999.99",
            "area"=> "required|in:". implode(",",array_keys(Empleados::AREAS)),
            "activo"=>"required|boolean"
        ]);

        $creado= Empleados::create($data);

        return ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $inicio)
    {
        
        return response()->json($empleados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleados)
    {
         $data= $request->validate([
            "name"=> "required|string|max:25",
            "lname"=> "required|string|max:35",
            "dni"=> "required|digits:8|unique:empleados,dni",
            "sexo"=> "required|in:femenino,masculino,otro",
            "email"=>"required|string|max:100|unique:empleados,email",
            "ciudad"=> "required|string|max:50",
            "cargo"=> "required|string|max:50",
            "sueldo"=> "required|numeric|min:0|max:9999999999.99",
            "area"=> "required|in:". implode(",",array_keys(Empleados::AREAS)),
            "activo"=>"required|boolean"
        ]);

        $empleados->update($data);

        return ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleados)
    {
        $user="{$empleados->name}, {$empleados->lname}";
        try{
            $empleados->delete();
        } catch(Throwable $e)
        {
            report($e);
        }

        return;
    }
}
