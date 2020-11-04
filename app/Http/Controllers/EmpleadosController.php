<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\Empleados\CreateEmpleadoRequest;
use App\Http\Requests\Empleados\UpdateEmpleadoRequest;

class EmpleadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::simplePaginate(10);
        return view('admin.empleados.index')->with([
            'sectionName' => 'Listado General Empleados',
            'empleados'    => $empleados 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $data = $request->validated();

        Empleado::create([
            'compania_id'   => (int)$data['compania'],
            'primer_nombre' => $data['nombre'],
            'apellido'  => $data['apellidos'],
            'correo'    => $data['correo'],
            'telefono'  => $data['telefono'],
        ]);

        return redirect()->back();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadoRequest $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $data = $request->validated();
        $empleado->update([
            'primer_nombre' =>  $data['nombre'],
            'apellido' =>  $data['apellidos'],
            'correo' =>  $data['correo'],
            'telefono' =>  $data['telefono'],
        ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        if($empleado){
            $empleado->delete();
        }

        return redirect()->back();
    }
}
