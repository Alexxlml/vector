<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\ClaveRadio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empleado.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosClaves = DB::table('clave_radio')->where('compartida','1')->orwhere('disponibilidad','1')->get();
        $datosAreas = DB::table('area')->get();
        $datosExtensiones = DB::table('extension')->get();
        $datosRutas = DB::table('ruta_transporte')->get();
        $datosRangos = DB::table('rango_factor')->get();
        
        $datosPuestos = DB::table('puesto')
                        ->join('nivel','nivel.Id_nivel','puesto.id_nivel')
                        ->select('puesto.*','nivel.*')
                        ->get();

                        //return response()->json($datosPuestos);
        return view('empleado.create')
        ->with('clavesRadio',$datosClaves)
        ->with('areas',$datosAreas)
        ->with('extensiones',$datosExtensiones)
        ->with('rutas',$datosRutas)
        ->with('puestos',$datosPuestos)
        ->with('rangos',$datosRangos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validación de campos
        $campos=[
            'no_colaborador'=>'required|digits:6',
            'nombre'=>'required|string|max:50',
            'ap_paterno' => 'required|string|max:50',
            'ap_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|numeric',
            'paternidad' => 'required|numeric',
            'turno' => 'required|numeric',
            'puesto'=>'required|numeric',
            'area'=>'required|numeric',
            'correo'=>'required|email',
            'tel_fijo'=>'required|digits:10',
            'tel_movil' => 'required|digits:10',
            'extension' => 'required|numeric',
            'clave_radio' => 'required|numeric',
            'supervisor' => 'required|string|max:6',
            'tipo_colaborador' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            'password' => 'required|string|max:12',
            'matriculacion' => 'required|numeric',
            'tipo_usuario' => 'required|numeric',
            //'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=[
            'no_colaborador.required'=>'El Número de Colaborador no es un número o excede 6 caracteres',
            'nombre.required'=>'El Nombre es obligatorio y no puede contener números o caracteres especiales',
            'ap_paterno.required'=>'El Apellido Paterno es obligatorio y no puede contener números o caracteres especiales',
            'ap_materno.required'=>'El Apellido Materno es obligatorio y no puede contener números o caracteres especiales',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento no puede estar vacía',
            'correo.required'=>'El Correo debe ser válido',
            'tel_fijo.required'=>'El Teléfono Fijo debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            'tel_movil.required'=>'El Teléfono Móvil debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            'supervisor.required'=>'El campo Supervisor debe contener un máximo de 6 dígitos que son el Número de Colaborador del anteriormente mencionado',
            'fecha_ingreso.required' => 'La Fecha de Ingreso no puede estar vacía',
            'password.required'=>'La Contraseña debe contener un máximo de 12 caracteres',
            //'foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosEmpleado = $request->all();
        $datosEmpleado = request()->except('_token');

        DB::table('colaborador')->insert([
            'no_colaborador' => $datosEmpleado['no_colaborador'],
            'nombre' => $datosEmpleado['nombre'],
            'ap_paterno' => $datosEmpleado['ap_paterno'],
            'ap_materno' => $datosEmpleado['ap_materno'],
            'fecha_nacimiento' => $datosEmpleado['fecha_nacimiento'],
            'genero' => $datosEmpleado['genero'],
            'paternidad' => $datosEmpleado['paternidad'],
            'turno' => $datosEmpleado['turno'],
            'ruta_transporte' => $datosEmpleado['ruta'],
            'puesto' => $datosEmpleado['puesto'],
            'area' => $datosEmpleado['area'],
            'correo' => $datosEmpleado['correo'],
            'tel_fijo' => $datosEmpleado['tel_fijo'],
            'tel_movil' => $datosEmpleado['tel_movil'],
            'extension' => $datosEmpleado['extension'],
            'clave_radio' => $datosEmpleado['clave_radio'],
            'supervisor' => $datosEmpleado['supervisor'],
            'tipo_colaborador' => $datosEmpleado['tipo_colaborador'],
            'fecha_ingreso' => $datosEmpleado['fecha_ingreso'],
            'password' => $datosEmpleado['password'],
            'matriculacion' => $datosEmpleado['matriculacion'],
            'tipo_usuario' => $datosEmpleado['tipo_usuario'],
            'rango_factor' => $datosEmpleado['rango_factor'],
            'rims' => '0',
            'autoeval_gen' => '0',
            'autoeval_asig' => '0',
            'autoeval_cal' => '0',
            'eval_gen' => '0',
            'eval_asig' => '0',
            'eval_cal' => '0',
            'estado' => '1',
            'foto' => '',
        ]);
        //return response()->json($datosEmpleado);
        return redirect('empleado/create')->with('mensaje','Empleado agregado con éxito');

        //return response()->json($datosEmpleado);
        /* if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleado::insert($datosEmpleado);

        
        return redirect('empleado')->with('mensaje','Empleado agregado con éxito'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo'=>'required|email'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        //
        $datosEmpleado = request()->except(['_token','_method']);
        
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        
        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje','Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Foto)){
            Empleado::destroy($id);  
        }

        return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}
