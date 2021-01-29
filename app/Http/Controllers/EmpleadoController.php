<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\ClaveRadio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosColaboradores = DB::table('colaborador')->get();
        //return response()->json($datosColaboradores);
        return view('empleado.index')->with('colaboradores', $datosColaboradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosClaves = DB::table('clave_radio')->where('compartida', '1')->orwhere('disponibilidad', '1')->get();
        $datosAreas = DB::table('area')->get();
        $datosExtensiones = DB::table('extension')->get();
        $datosRutas = DB::table('ruta_transporte')->get();
        $datosSupervisores = DB::table('colaborador')->select('no_colaborador', 'nombre', 'ap_paterno', 'ap_materno')->get();

        $datosPuestos = DB::table('puesto')
            ->join('nivel', 'nivel.Id_nivel', 'puesto.id_nivel')
            ->select('puesto.*', 'nivel.*')
            ->get();

        //return response()->json($datosSupervisores);
        return view('empleado.create')
            ->with('clavesRadio', $datosClaves)
            ->with('areas', $datosAreas)
            ->with('extensiones', $datosExtensiones)
            ->with('rutas', $datosRutas)
            ->with('puestos', $datosPuestos)
            ->with('supervisores', $datosSupervisores);
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
        $campos = [
            'no_colaborador' => 'required|digits:6',
            'nombre' => 'required|string|max:50',
            'ap_paterno' => 'required|string|max:50',
            'ap_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|numeric',
            'paternidad' => 'required|numeric',
            'turno' => 'required|numeric',
            'puesto' => 'required|numeric',
            'area' => 'required|numeric',
            'correo' => 'required|email',
            'tel_fijo' => 'required|digits:10',
            'tel_movil' => 'required|digits:10',
            'extension' => 'required|numeric',
            'clave_radio' => 'required|numeric',
            /* 'supervisor' => 'required|string|max:6', */
            'tipo_colaborador' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            /* 'password' => 'required|string|max:12', */
            'matriculacion' => 'required|numeric',
            'tipo_usuario' => 'required|numeric',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'no_colaborador.required' => 'El Número de Colaborador no es un número o excede 6 caracteres',
            'nombre.required' => 'El Nombre es obligatorio y no puede contener números o caracteres especiales',
            'ap_paterno.required' => 'El Apellido Paterno es obligatorio y no puede contener números o caracteres especiales',
            'ap_materno.required' => 'El Apellido Materno es obligatorio y no puede contener números o caracteres especiales',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento no puede estar vacía',
            'correo.required' => 'El Correo debe ser válido',
            'tel_fijo.required' => 'El Teléfono Fijo debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            'tel_movil.required' => 'El Teléfono Móvil debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            /* 'supervisor.required'=>'El campo Supervisor debe contener un máximo de 6 dígitos que son el Número de Colaborador del anteriormente mencionado', */
            'fecha_ingreso.required' => 'La Fecha de Ingreso no puede estar vacía',
            /* 'password.required'=>'La Contraseña debe contener un máximo de 12 caracteres', */
            'foto.required' => 'La Foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosColaborador = $request->all();

        $datosColaborador = request()->except('_token');
        try {



            if ($request->hasFile('foto')) {
                $datosColaborador['foto'] = $request->file('foto')->store('uploads', 'public');
            }

            if ($datosColaborador['tipo_colaborador'] == 1 | $datosColaborador['tipo_colaborador'] == 3) {
                DB::table('colaborador')->insert([
                    'no_colaborador' => $datosColaborador['no_colaborador'],
                    'nombre' => $datosColaborador['nombre'],
                    'ap_paterno' => $datosColaborador['ap_paterno'],
                    'ap_materno' => $datosColaborador['ap_materno'],
                    'fecha_nacimiento' => $datosColaborador['fecha_nacimiento'],
                    'genero' => $datosColaborador['genero'],
                    'paternidad' => $datosColaborador['paternidad'],
                    'num_edad' => $datosColaborador['num_edad'],
                    'turno' => $datosColaborador['turno'],
                    'ruta_transporte' => $datosColaborador['ruta'],
                    'puesto' => $datosColaborador['puesto'],
                    'area' => $datosColaborador['area'],
                    'correo' => $datosColaborador['correo'],
                    'tel_fijo' => $datosColaborador['tel_fijo'],
                    'tel_movil' => $datosColaborador['tel_movil'],
                    'extension' => $datosColaborador['extension'],
                    'clave_radio' => $datosColaborador['clave_radio'],
                    'supervisor' => $datosColaborador['supervisor'],
                    'tipo_colaborador' => $datosColaborador['tipo_colaborador'],
                    'fecha_ingreso' => $datosColaborador['fecha_ingreso'],
                    'password' => $datosColaborador['password'],
                    'matriculacion' => $datosColaborador['matriculacion'],
                    'tipo_usuario' => $datosColaborador['tipo_usuario'],
                    'rango_factor' => '1',
                    'rims' => '0',
                    'autoeval_gen' => '0',
                    'autoeval_asig' => '0',
                    'autoeval_cal' => '0',
                    'eval_gen' => '0',
                    'eval_asig' => '0',
                    'eval_cal' => '0',
                    'estado' => '1',
                    'foto' => $datosColaborador['foto']
                ]);
            } else if ($datosColaborador['tipo_colaborador'] == 2) {
                DB::table('colaborador')->insert([
                    'no_colaborador' => $datosColaborador['no_colaborador'],
                    'nombre' => $datosColaborador['nombre'],
                    'ap_paterno' => $datosColaborador['ap_paterno'],
                    'ap_materno' => $datosColaborador['ap_materno'],
                    'fecha_nacimiento' => $datosColaborador['fecha_nacimiento'],
                    'genero' => $datosColaborador['genero'],
                    'paternidad' => $datosColaborador['paternidad'],
                    'num_edad' => $datosColaborador['num_edad'],
                    'turno' => $datosColaborador['turno'],
                    'ruta_transporte' => $datosColaborador['ruta'],
                    'puesto' => $datosColaborador['puesto'],
                    'area' => $datosColaborador['area'],
                    'correo' => $datosColaborador['correo'],
                    'tel_fijo' => $datosColaborador['tel_fijo'],
                    'tel_movil' => $datosColaborador['tel_movil'],
                    'extension' => $datosColaborador['extension'],
                    'clave_radio' => $datosColaborador['clave_radio'],
                    'supervisor' => $datosColaborador['supervisor'],
                    'tipo_colaborador' => $datosColaborador['tipo_colaborador'],
                    'fecha_ingreso' => $datosColaborador['fecha_ingreso'],
                    'password' => $datosColaborador['password'],
                    'matriculacion' => $datosColaborador['matriculacion'],
                    'tipo_usuario' => $datosColaborador['tipo_usuario'],
                    'rango_factor' => '2',
                    'rims' => '0',
                    'autoeval_gen' => '0',
                    'autoeval_asig' => '0',
                    'autoeval_cal' => '0',
                    'eval_gen' => '0',
                    'eval_asig' => '0',
                    'eval_cal' => '0',
                    'estado' => '1',
                    'foto' => $datosColaborador['foto']
                ]);
            }

            for ($i = 1; $i<=6; $i++){
                DB::table('colaborador_evento')->insert([
                    'no_colaborador'=>$datosColaborador['no_colaborador'],
                    'idEventos_Especiales'=>$i,
                    'entrega'=> '0'
                ]);
            }

            //return response()->json($datosColaborador);
            return redirect('empleado/consulta')->with('alertSuccess', 'Colaborador registrado con éxito');
        } catch (\Exception $exception) {
            //return response()->json($datosColaborador);
            return redirect()->back()->with('alertDanger', 'El Colaborador ya existe');
        }
        //return response()->json($datosColaborador);
        //return redirect('empleado/create')->with('alert','Empleado agregado con éxito');

        //return response()->json($datosColaborador);

        /*
        Empleado::insert($datosColaborador);

        
        return redirect('empleado')->with('mensaje','Empleado agregado con éxito'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $datosColaboradores = DB::table('colaborador')->get();
        //return response()->json($datosColaboradores);
        return view('empleado.consulta')->with('colaboradores', $datosColaboradores);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($no_colaborador)
    {
        try {
            $datosColaborador = DB::table('colaborador')->where('no_colaborador', $no_colaborador)->first();
            $datosClaves = DB::table('clave_radio')->get();
            $datosAreas = DB::table('area')->get();
            $datosExtensiones = DB::table('extension')->get();
            $datosRutas = DB::table('ruta_transporte')->get();
            $datosRangos = DB::table('rango_factor')->get();
            $datosSupervisores = DB::table('colaborador')->select('no_colaborador', 'nombre', 'ap_paterno', 'ap_materno')->get();

            $datosPuestos = DB::table('puesto')
                ->join('nivel', 'nivel.Id_nivel', 'puesto.id_nivel')
                ->select('puesto.*', 'nivel.*')
                ->get();
            $colaboradorEvento = DB::table('colaborador_evento')
                ->join('Eventos_Especiales', 'Eventos_Especiales.idEventos_Especiales', 'colaborador_evento.idEventos_Especiales')
                ->select('colaborador_evento.*', 'Eventos_Especiales.*')
                ->where('no_colaborador', $no_colaborador)
                ->get();

            $fechaIng = Carbon::parse($datosColaborador->fecha_ingreso);
            $fechaActual = Carbon::Now()->parse();
            $fechaQuinquenio = $fechaIng->diffInYears($fechaActual);

            //return response()->json($datosColaborador);
            return view('empleado.edit')
                ->with('datosColaborador', $datosColaborador)
                ->with('clavesRadio', $datosClaves)
                ->with('areas', $datosAreas)
                ->with('extensiones', $datosExtensiones)
                ->with('rutas', $datosRutas)
                ->with('puestos', $datosPuestos)
                ->with('rangos', $datosRangos)
                ->with('supervisores', $datosSupervisores)
                ->with('fechaQuinquenio', $fechaQuinquenio)
                ->with('colaboradorEvento', $colaboradorEvento);
        } catch (\Exception $exception) {
            return redirect()->back()->with('alertDanger', 'El Colaborador no existe');
        }

        //
        //$empleado=Empleado::findOrFail($id);
        //return view('empleado.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_colaborador)
    {
        //
        // Validación de campos
        //
        $fotoColaborador = DB::table('colaborador')->where('no_colaborador', $no_colaborador)
            ->select('foto')
            ->first();

        $campos = [
            'no_colaborador' => 'required|digits:6',
            'nombre' => 'required|string|max:50',
            'ap_paterno' => 'required|string|max:50',
            'ap_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|numeric',
            'paternidad' => 'required|numeric',
            'turno' => 'required|numeric',
            'puesto' => 'required|numeric',
            'area' => 'required|numeric',
            'correo' => 'required|email',
            'tel_fijo' => 'required|digits:10',
            'tel_movil' => 'required|digits:10',
            'extension' => 'required|numeric',
            'clave_radio' => 'required|numeric',
            /* 'supervisor' => 'required|string|max:6', */
            'tipo_colaborador' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            /* 'password' => 'required|string|max:12', */
            'matriculacion' => 'required|numeric',
            'tipo_usuario' => 'required|numeric',
            'rango_factor' => 'required|numeric'
            /* 'foto'=>'required|max:10000|mimes:jpeg,png,jpg' */
        ];
        $mensaje = [
            'no_colaborador.required' => 'El Número de Colaborador no es un número o excede 6 caracteres',
            'nombre.required' => 'El Nombre es obligatorio y no puede contener números o caracteres especiales',
            'ap_paterno.required' => 'El Apellido Paterno es obligatorio y no puede contener números o caracteres especiales',
            'ap_materno.required' => 'El Apellido Materno es obligatorio y no puede contener números o caracteres especiales',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento no puede estar vacía',
            'correo.required' => 'El Correo debe ser válido',
            'tel_fijo.required' => 'El Teléfono Fijo debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            'tel_movil.required' => 'El Teléfono Móvil debe contener un máximo de 10 dígitos y no puede contener letras o caracteres especiales',
            /* 'supervisor.required'=>'El campo Supervisor debe contener un máximo de 6 dígitos que son el Número de Colaborador del anteriormente mencionado', */
            'fecha_ingreso.required' => 'La Fecha de Ingreso no puede estar vacía',
            /* 'password.required'=>'La Contraseña debe contener un máximo de 12 caracteres', */
            /* 'foto.required'=>'La Foto es requerida' */
        ];

        $this->validate($request, $campos, $mensaje);



        try {
            $datosColaborador = request()->except(['_token', '_method']);

            if ($request->hasFile('foto')) {
                Storage::delete('public/' . $fotoColaborador->foto);
                $datosColaborador['foto'] = $request->file('foto')->store('uploads', 'public');

                DB::table('colaborador')
                    ->where(['no_colaborador' => $datosColaborador['no_colaborador']])
                    ->update([
                        'nombre' => $datosColaborador['nombre'],
                        'ap_paterno' => $datosColaborador['ap_paterno'],
                        'ap_materno' => $datosColaborador['ap_materno'],
                        'fecha_nacimiento' => $datosColaborador['fecha_nacimiento'],
                        'genero' => $datosColaborador['genero'],
                        'paternidad' => $datosColaborador['paternidad'],
                        'num_edad' => $datosColaborador['num_edad'],
                        'turno' => $datosColaborador['turno'],
                        'ruta_transporte' => $datosColaborador['ruta'],
                        'puesto' => $datosColaborador['puesto'],
                        'area' => $datosColaborador['area'],
                        'correo' => $datosColaborador['correo'],
                        'tel_fijo' => $datosColaborador['tel_fijo'],
                        'tel_movil' => $datosColaborador['tel_movil'],
                        'extension' => $datosColaborador['extension'],
                        'clave_radio' => $datosColaborador['clave_radio'],
                        'supervisor' => $datosColaborador['supervisor'],
                        'tipo_colaborador' => $datosColaborador['tipo_colaborador'],
                        'fecha_ingreso' => $datosColaborador['fecha_ingreso'],
                        'password' => $datosColaborador['password'],
                        'matriculacion' => $datosColaborador['matriculacion'],
                        'tipo_usuario' => $datosColaborador['tipo_usuario'],
                        'rango_factor' => $datosColaborador['rango_factor'],
                        'rims' => '0',
                        'autoeval_gen' => '0',
                        'autoeval_asig' => '0',
                        'autoeval_cal' => '0',
                        'eval_gen' => '0',
                        'eval_asig' => '0',
                        'eval_cal' => '0',
                        'estado' => '1',
                        'foto' => $datosColaborador['foto']
                    ]);
            } else {
                DB::table('colaborador')
                    ->where(['no_colaborador' => $datosColaborador['no_colaborador']])
                    ->update([
                        'nombre' => $datosColaborador['nombre'],
                        'ap_paterno' => $datosColaborador['ap_paterno'],
                        'ap_materno' => $datosColaborador['ap_materno'],
                        'fecha_nacimiento' => $datosColaborador['fecha_nacimiento'],
                        'genero' => $datosColaborador['genero'],
                        'paternidad' => $datosColaborador['paternidad'],
                        'num_edad' => $datosColaborador['num_edad'],
                        'turno' => $datosColaborador['turno'],
                        'ruta_transporte' => $datosColaborador['ruta'],
                        'puesto' => $datosColaborador['puesto'],
                        'area' => $datosColaborador['area'],
                        'correo' => $datosColaborador['correo'],
                        'tel_fijo' => $datosColaborador['tel_fijo'],
                        'tel_movil' => $datosColaborador['tel_movil'],
                        'extension' => $datosColaborador['extension'],
                        'clave_radio' => $datosColaborador['clave_radio'],
                        'supervisor' => $datosColaborador['supervisor'],
                        'tipo_colaborador' => $datosColaborador['tipo_colaborador'],
                        'fecha_ingreso' => $datosColaborador['fecha_ingreso'],
                        'password' => $datosColaborador['password'],
                        'matriculacion' => $datosColaborador['matriculacion'],
                        'tipo_usuario' => $datosColaborador['tipo_usuario'],
                        'rango_factor' => $datosColaborador['rango_factor'],
                        'rims' => '0',
                        'autoeval_gen' => '0',
                        'autoeval_asig' => '0',
                        'autoeval_cal' => '0',
                        'eval_gen' => '0',
                        'eval_asig' => '0',
                        'eval_cal' => '0',
                        'estado' => '1'
                    ]);
            }
            //return response()->json($datosColaborador);
            return redirect()->back() ->with('alertSuccess', 'Los datos del colaborador han sido modificados correctamente');
        } catch (\Exception $exception) {
            //return response()->json($datosColaborador);
            return redirect()->back() ->with('alertDanger', 'Ha ocurrido un error al intentar modificar los datos');
        }

        //return view('empleado.edit', compact('empleado'));
        //return redirect('empleado')->with('mensaje','Empleado Modificado');
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
        $empleado = Empleado::findOrFail($id);

        if (Storage::delete('public/' . $empleado->Foto)) {
            Empleado::destroy($id);
        }

        return redirect('empleado')->with('mensaje', 'Empleado Borrado');
    }
}
