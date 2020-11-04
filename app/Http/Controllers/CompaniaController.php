<?php

namespace App\Http\Controllers;

use App\Compania;
use App\Empleado;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Companias\CreateCompaniaRequest;
use App\Http\Requests\Companias\UpdateCompaniaRequest;

class CompaniaController extends Controller
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
        $companias = Compania::simplePaginate(10);
        return view('admin.companias.index')->with([
            'sectionName' => 'Listado General Compañias',
            'companias'    => $companias 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companias.create')->with([
            'sectionName' => 'Crear Compañia',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompaniaRequest $request)
    {
        $data = $request->validated();

        $archLogo = null;
        if(array_key_exists('logo', $data)){
            $archLogo = 'storage/logos/'.$this->saveLogo($data['logo']);
        }    

        $compania = Compania::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'logo'   => $archLogo,
            'pagina_web' => $data['pagina_web']
        ]);

        return redirect()->route('companias.show',$compania);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compania = Compania::findOrFail($id);
        $empleados = Empleado::where('compania_id',$compania->id)->simplePaginate(10);

        return view('admin.companias.show')->with([
            'compania' => $compania,
            'empleados' => $empleados
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compania = Compania::findOrFail($id);

        return view('admin.companias.update')->with([
            'compania' => $compania,
            'sectionName' => 'Editar datos '.$compania->nombre
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompaniaRequest $request, $id)
    {
        $compania = Compania::findOrFail($id);

        $data = $request->validated();

        $archLogo = null;
        if(array_key_exists('logo', $data)){
            $this->deleteLogo($compania->logo);
            $archLogo = 'storage/logos/'.$this->saveLogo($data['logo']);
        }
        
        $compania->update([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'logo'   => $archLogo,
            'pagina_web' => $data['pagina_web']
        ]);

        return redirect()->route('companias.show',$compania);
    }

    private function saveLogo($dataLogo)
    {
        $nombreArchivo = Str::random(8)."_". str_replace(" ","_",$dataLogo->getClientOriginalName());
        $dataLogo->storeAs(
            'public/logos',
            $nombreArchivo
        );

        return $nombreArchivo;
    }

    private function deleteLogo($logo)
    {
        if(Storage::exists(str_replace('storage','public',$logo))){
            Storage::delete(str_replace('storage','public',$logo));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compania = Compania::findOrFail($id);
        
        if($compania->has('empleados'))
        {
            $compania->empleados->each(function($empleado){
                $empleado->delete();
            });
        }
        
        $this->deleteLogo($compania->logo);

        $compania->delete();

        return redirect()->route('companias.index');
    }
}
