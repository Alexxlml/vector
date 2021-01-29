{{-- <h1>{{ $modo }} colaborador</h1> --}}
<div class="card">
    <div class="card-body">
        @if (count($errors) > 0)

            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('alertDanger'))
            <div class="alert alert-danger alert-dismissible container" role="alert">
                {{ Session::get('alertDanger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (Session::has('alertSuccess'))
            <div class="alert alert-success alert-dismissible container" role="alert">
                {{ Session::get('alertSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (isset($datosColaborador))
            <div class="form-row">
                <div class="col-md-3">
                    @if (isset($datosColaborador->foto))
                        <img src="{{ asset('storage') . '/' . $datosColaborador->foto }}" alt=""
                            class="img-fluid rounded shadow border border-secondary">
                    @endif
                </div>

                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputNoColaborador">No. Colaborador</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_colaborador" class="form-control" id="inputNoColaborador"
                                placeholder="Número de Colaborador"
                                value="{{ isset($datosColaborador->no_colaborador) ? $datosColaborador->no_colaborador : old('no_colaborador') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputNombre">Nombre(s)</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombre" id="inputNombre" placeholder="Nombre" class="form-control"
                                value="{{ isset($datosColaborador->nombre) ? $datosColaborador->nombre : old('nombre') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputApPaterno">Apellido Paterno</label>
                        <div class="col-sm-10">
                            <input type="text" name="ap_paterno" id="inputApPaterno" placeholder="Apellido Paterno"
                                value="{{ isset($datosColaborador->ap_paterno) ? $datosColaborador->ap_paterno : old('ap_paterno') }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputApMaterno">Apellido Materno</label>
                        <div class="col-sm-10">
                            <input type="text" name="ap_materno" id="inputApMaterno" placeholder="Apellido Materno"
                                value="{{ isset($datosColaborador->ap_materno) ? $datosColaborador->ap_materno : old('ap_materno') }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group custom-file col-md-12">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" id="fileLabel" for="customFile">Elegir un archivo</label>
                    </div>
                </div>

            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputGenero">Género</label>
                    <select id="inputGenero" name="genero" class="form-control">
                        @if (isset($datosColaborador->genero))
                            @if ($datosColaborador->genero == '1')
                                <option value="1" selected="selected">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                            @elseif($datosColaborador->genero == '2')
                                <option value="1">Masculino</option>
                                <option value="2" selected="selected">Femenino</option>
                                <option value="3">No Binario</option>
                            @elseif($datosColaborador->genero == '3')
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3" selected="selected">No Binario</option>
                            @else
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                            @endif
                        @else
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">No Binario</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" id="inputFechaNacimiento"
                        value="{{ isset($datosColaborador->fecha_nacimiento) ? $datosColaborador->fecha_nacimiento : old('fecha_nacimiento') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputHijos">¿Tiene Hijos?</label>
                    <select id="inputHijos" name="paternidad" class="form-control">
                        @if (isset($datosColaborador->paternidad))
                            @if ($datosColaborador->paternidad == 0)
                                <option value="0" selected="selected">No</option>
                                <option value="1">Si</option>
                            @elseif($datosColaborador->paternidad == 1)
                                <option value="0">No</option>
                                <option value="1" selected="selected">Si</option>
                            @endif
                        @else
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        @endif

                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNumHijos">Número de Hijos y edades</label>
                    <input type="text" name="num_edad" class="form-control" id="inputNumHijos" placeholder="2,8,9"
                        value="{{ isset($datosColaborador->num_edad) ? $datosColaborador->num_edad : old('num_edad') }}">
                </div>
            </div>
        @else
            <div class="form-row">
                <div class="form-group col-md-3">
                    @if (isset($datosColaborador->foto))
                        <img src="{{ asset('storage') . '/' . $datosColaborador->foto }}" alt=""
                            class="img-fluid rounded shadow border border-secondary">
                    @endif

                </div>

                <div class="form-group custom-file col-md-12">
                    <input type="file" name="foto" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" id="fileLabel" for="customFile">Elegir un archivo</label>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNoColaborador">Número de Colaborador</label>
                    <input type="text" name="no_colaborador" class="form-control" id="inputNoColaborador"
                        placeholder="Número de Colaborador"
                        value="{{ isset($datosColaborador->no_colaborador) ? $datosColaborador->no_colaborador : old('no_colaborador') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNombre">Nombre(s)</label>
                    <input type="text" name="nombre" id="inputNombre" placeholder="Nombre" class="form-control"
                        value="{{ isset($datosColaborador->nombre) ? $datosColaborador->nombre : old('nombre') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputApPaterno">Apellido Paterno</label>
                    <input type="text" name="ap_paterno" id="inputApPaterno" placeholder="Apellido Paterno"
                        value="{{ isset($datosColaborador->ap_paterno) ? $datosColaborador->ap_paterno : old('ap_paterno') }}"
                        class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputApMaterno">Apellido Materno</label>
                    <input type="text" name="ap_materno" id="inputApMaterno" placeholder="Apellido Materno"
                        value="{{ isset($datosColaborador->ap_materno) ? $datosColaborador->ap_materno : old('ap_materno') }}"
                        class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputGenero">Género</label>
                    <select id="inputGenero" name="genero" class="form-control">
                        @if (isset($datosColaborador->genero))
                            @if ($datosColaborador->genero == '1')
                                <option value="1" selected="selected">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                            @elseif($datosColaborador->genero == '2')
                                <option value="1">Masculino</option>
                                <option value="2" selected="selected">Femenino</option>
                                <option value="3">No Binario</option>
                            @elseif($datosColaborador->genero == '3')
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3" selected="selected">No Binario</option>
                            @else
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                            @endif
                        @else
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">No Binario</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" id="inputFechaNacimiento"
                        value="{{ isset($datosColaborador->fecha_nacimiento) ? $datosColaborador->fecha_nacimiento : old('fecha_nacimiento') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputHijos">¿Tiene Hijos?</label>
                    <select id="inputHijos" name="paternidad" class="form-control">
                        @if (isset($datosColaborador->paternidad))
                            @if ($datosColaborador->paternidad == 0)
                                <option value="0" selected="selected">No</option>
                                <option value="1">Si</option>
                            @elseif($datosColaborador->paternidad == 1)
                                <option value="0">No</option>
                                <option value="1" selected="selected">Si</option>
                            @endif
                        @else
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        @endif

                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNumHijos">Número de Hijos y edades</label>
                    <input type="text" name="num_edad" class="form-control" id="inputNumHijos" placeholder="2,8,9"
                        value="{{ isset($datosColaborador->num_edad) ? $datosColaborador->num_edad : old('num_edad') }}">
                </div>
            </div>
        @endif

        {{-- Formulario de creación --}}

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputTipoCol">Tipo de Colaborador</label>
                <select id="inputTipoCol" name="tipo_colaborador" class="form-control">

                    @if (isset($datosColaborador->tipo_colaborador))
                        @if ($datosColaborador->tipo_colaborador == 1)
                            <option value="1" selected="selected">Operativo</option>
                            <option value="2">Administrativo</option>
                            <option value="3">Talento</option>
                        @elseif ($datosColaborador->tipo_colaborador == 2)
                            <option value="1">Operativo</option>
                            <option value="2" selected="selected">Administrativo</option>
                            <option value="3">Talento</option>
                        @elseif ($datosColaborador->tipo_colaborador == 3)
                            <option value="1">Operativo</option>
                            <option value="2">Administrativo</option>
                            <option value="3" selected="selected">Talento</option>
                        @endif
                    @else
                        <option value="1">Operativo</option>
                        <option value="2">Administrativo</option>
                        <option value="3">Talento</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputTurno">Turno del Colaborador</label>
                <select id="inputTurno" name="turno" class="form-control">

                    @if (isset($datosColaborador->tipo_colaborador))
                        @if ($datosColaborador->turno == 1)
                            <option value="1" selected="selected">Matutino</option>
                            <option value="2">Vespertino</option>
                            <option value="3">Nocturno</option>
                            <option value="4">Mixto</option>
                        @elseif ($datosColaborador->turno == 2)
                            <option value="1">Matutino</option>
                            <option value="2" selected="selected">Vespertino</option>
                            <option value="3">Nocturno</option>
                            <option value="4">Mixto</option>
                        @elseif ($datosColaborador->turno == 3)
                            <option value="1">Matutino</option>
                            <option value="2">Vespertino</option>
                            <option value="3" selected="selected">Nocturno</option>
                            <option value="4">Mixto</option>
                        @elseif ($datosColaborador->turno == 4)
                            <option value="1">Matutino</option>
                            <option value="2">Vespertino</option>
                            <option value="3">Nocturno</option>
                            <option value="4" selected="selected">Mixto</option>
                        @endif
                    @else
                        <option value="1">Matutino</option>
                        <option value="2">Vespertino</option>
                        <option value="3">Nocturno</option>
                        <option value="4">Mixto</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCorreo">Correo</label>
                <input type="email" name="correo" placeholder="Correo" id="inputCorreo"
                    value="{{ isset($datosColaborador->correo) ? $datosColaborador->correo : old('correo') }}"
                    class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="inputRuta">Ruta de Transporte</label>
                <select id="inputRuta" name="ruta" class="form-control">
                    @foreach ($rutas as $ruta)
                        @if (isset($datosColaborador->ruta))
                            @if ($datosColaborador->ruta_transporte == $ruta->idRuta_Transporte)
                                <option value="{{ $ruta->idRuta_Transporte }}" selected="selected">
                                    {{ $ruta->nombre_ruta }}
                                </option>
                            @else
                                <option value="{{ $ruta->idRuta_Transporte }}">{{ $ruta->nombre_ruta }}</option>
                            @endif
                        @else
                            <option value="{{ $ruta->idRuta_Transporte }}">{{ $ruta->nombre_ruta }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        @if (isset($datosColaborador))
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="selectNivel">Puesto</label>
                    <select id="selectNivel" name="puesto" class="form-control">

                        @foreach ($puestos as $puesto)
                            @if (isset($datosColaborador->puesto))
                                @if ($datosColaborador->puesto == $puesto->idPuesto)
                                    <option value="{{ $puesto->idPuesto }}" selected="selected">
                                        {{ $puesto->nombre_nivel }} {{ $puesto->especialidad_puesto }}
                                    </option>
                                @else
                                    <option value="{{ $puesto->idPuesto }}">{{ $puesto->nombre_nivel }}
                                        {{ $puesto->especialidad_puesto }}
                                    </option>
                                @endif
                            @else
                                <option value="{{ $puesto->idPuesto }}">{{ $puesto->nombre_nivel }}
                                    {{ $puesto->especialidad_puesto }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="selectArea">Area</label>
                    <select id="selectArea" name="area" class="form-control">
                        @foreach ($areas as $area)
                            @if (isset($datosColaborador->area))
                                @if ($datosColaborador->area == $area->idArea)
                                    <option value="{{ $area->idArea }}" selected="selected">{{ $area->nombre_area }}
                                    </option>
                                @else
                                    <option value="{{ $area->idArea }}">{{ $area->nombre_area }}</option>
                                @endif
                            @else
                                <option value="{{ $area->idArea }}">{{ $area->nombre_area }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="selectSupervisor">Supervisor</label>
                    <select id="selectSupervisor" name="supervisor" class="form-control">
                        @foreach ($supervisores as $supervisor)
                            @if (isset($datosColaborador->supervisor))
                                @if ($datosColaborador->supervisor == $supervisor->no_colaborador)
                                    <option value="{{ $supervisor->no_colaborador }}" selected="selected">
                                        {{ $supervisor->nombre }} {{ $supervisor->ap_paterno }}
                                        {{ $supervisor->ap_materno }}
                                    </option>
                                @else
                                    <option value="{{ $supervisor->no_colaborador }}">{{ $supervisor->nombre }}
                                        {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                                    </option>
                                @endif
                            @else
                                <option value="{{ $supervisor->no_colaborador }}">{{ $supervisor->nombre }}
                                    {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputTelFijo">Teléfono Fijo</label>
                    <input type="text" name="tel_fijo" class="form-control" id="inputTelFijo"
                        placeholder="Teléfono Fijo"
                        value="{{ isset($datosColaborador->tel_fijo) ? $datosColaborador->tel_fijo : old('tel_fijo') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputTelMovil">Teléfono Móvil</label>
                    <input type="text" name="tel_movil" class="form-control" id="inputTelMovil"
                        placeholder="Teléfono Móvil"
                        value="{{ isset($datosColaborador->tel_movil) ? $datosColaborador->tel_movil : old('tel_movil') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputExtension">Extensión</label>
                    <select id="inputExtension" name="extension" class="form-control">
                        @foreach ($extensiones as $ext)
                            @if (isset($datosColaborador->extension))
                                @if ($datosColaborador->extension == $ext->idExtension)
                                    <option value="{{ $ext->idExtension }}" selected="selected">
                                        {{ $ext->numero_extension }}
                                    </option>
                                @else
                                    <option value="{{ $ext->idExtension }}">{{ $ext->numero_extension }}</option>
                                @endif
                            @else
                                <option value="{{ $ext->idExtension }}">{{ $ext->numero_extension }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputClaveRadio">Clave de Radio</label>
                    <select id="inputClaveRadio" name="clave_radio" class="form-control">
                        @foreach ($clavesRadio as $clave)
                            @if (isset($datosColaborador->clave_radio))
                                @if ($datosColaborador->clave_radio == $clave->idClave_Radio)
                                    <option value="{{ $clave->idClave_Radio }}" selected="selected">{{ $clave->clave }}
                                    </option>
                                @else
                                    <option value="{{ $clave->idClave_Radio }}">{{ $clave->clave }}</option>
                                @endif
                            @else
                                <option value="{{ $clave->idClave_Radio }}">{{ $clave->clave }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputMatriculacion">Matriculación</label>
                    <select id="inputMatriculacion" name="matriculacion" class="form-control">
                        @if (isset($datosColaborador->matriculacion))
                            @if ($datosColaborador->matriculacion == 1)
                                <option value="1" selected="selected">Si</option>
                                <option value="0">No</option>
                            @elseif ($datosColaborador->matriculacion == 0)
                                <option value="1">Si</option>
                                <option value="0" selected="selected">No</option>
                            @endif
                        @else
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        @endif

                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputTipoUsuario">Tipo de Usuario</label>
                    <select id="inputTipoUsuario" name="tipo_usuario" class="form-control">
                        @if (isset($datosColaborador->tipo_usuario))
                            @if ($datosColaborador->tipo_usuario == 1)
                                <option value="1" selected="selected">Staff</option>
                                <option value="2">Directivo</option>
                                <option value="3">Sindical</option>
                            @elseif ($datosColaborador->tipo_usuario == 2)
                                <option value="1">Staff</option>
                                <option value="2" selected="selected">Directivo</option>
                                <option value="3">Sindical</option>
                            @elseif ($datosColaborador->tipo_usuario == 3)
                                <option value="1">Staff</option>
                                <option value="2">Directivo</option>
                                <option value="3" selected="selected">Sindical</option>
                            @endif
                        @else
                            <option value="1">Staff</option>
                            <option value="2">Directivo</option>
                            <option value="3">Sindical</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword">Contraseña</label>
                    <input type="text" name="password" class="form-control" id="inputPassword" placeholder="Contraseña"
                        value="{{ isset($datosColaborador->password) ? $datosColaborador->password : old('password') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRangoFactor">Rango en Factor</label>
                    <select id="inputRangoFactor" name="rango_factor" class="form-control">
                        @foreach ($rangos as $rango)
                            @if (isset($datosColaborador->rango_factor))
                                @if ($datosColaborador->rango_factor == $rango->idrango_factor)
                                    <option value="{{ $rango->idrango_factor }}" selected="selected">
                                        {{ $rango->nombre_rango }}
                                    </option>
                                @else
                                    <option value="{{ $rango->idrango_factor }}">{{ $rango->nombre_rango }}</option>
                                @endif
                            @else
                                <option value="{{ $rango->idrango_factor }}">{{ $rango->nombre_rango }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2 text-center">
                    <label for="inputPassword">Autoevaluación</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="autoEvalGen" class="custom-control-input" id="switchAEvalGen" @if (isset($datosColaborador->autoeval_gen))  @if ($datosColaborador->autoeval_gen==1)
                        checked="checked"
                    @else
                        {{ old('autoEvalGen') }} @endif
                    @else
                        {{ old('autoEvalGen') }}
        @endif
        >
        <label class="custom-control-label" for="switchAEvalGen">Generada</label>
    </div>
</div>
<div class="form-group col-md-2 text-center">
    <label for="inputPassword">Autoevaluación</label>
    <div class="custom-control custom-switch">
        <input type="checkbox" name="autoEvalAsig" class="custom-control-input" id="switchAEvalAsig" @if (isset($datosColaborador->autoeval_asig))  @if ($datosColaborador->autoeval_asig==1)
        checked="checked"
    @else
        {{ old('autoEvalAsig') }} @endif
    @else
        {{ old('autoEvalAsig') }}
        @endif
        >
        <label class="custom-control-label" for="switchAEvalAsig">Asignada</label>
    </div>
</div>

<div class="form-group col-md-2">
    <label for="inputCalAEval">Calificación</label>
    <input type="number" min="0" max="100" name="autoEvalCal" class="form-control" id="inputCalAEval"
        placeholder="Calificación"
        value="{{ isset($datosColaborador->autoeval_cal) ? $datosColaborador->autoeval_cal : old('autoEvalCal') }}">
</div>

<div class="form-group col-md-2 text-center">
    <label for="inputPassword">Evaluación</label>
    <div class="custom-control custom-switch">
        <input type="checkbox" name="evalGen" class="custom-control-input" id="switchEvalGen" @if (isset($datosColaborador->eval_gen))  @if ($datosColaborador->eval_gen==1)
        checked="checked"
    @else
        {{ old('evalGen') }} @endif
    @else
        {{ old('evalGen') }}
        @endif

        >
        <label class="custom-control-label" for="switchEvalGen">Generada</label>
    </div>
</div>
<div class="form-group col-md-2 text-center">
    <label for="inputPassword">Evaluación</label>
    <div class="custom-control custom-switch">
        <input type="checkbox" name="evalAsig" class="custom-control-input" id="switchEvalAsig" @if (isset($datosColaborador->eval_asig))  @if ($datosColaborador->eval_asig==1)
        checked="checked"
    @else
        {{ old('evalAsig') }} @endif
    @else
        {{ old('evalAsig') }}
        @endif

        >
        <label class="custom-control-label" for="switchEvalAsig">Asignada</label>
    </div>
</div>
<div class="form-group col-md-2">
    <label for="inputCalEval">Calificación</label>
    <input type="number" min="0" max="100" name="evalAsigCal" class="form-control" id="inputCalEval"
        placeholder="Calificación"
        value="{{ isset($datosColaborador->eval_cal) ? $datosColaborador->eval_cal : old('evalAsigCal') }}">
</div>
</div>

<div class="form-row">

    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Quinquenio</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="quinquenioAplica" class="custom-control-input" id="switchQAplica" disabled @if (isset($fechaQuinquenio))  @if (($fechaQuinquenio==5) | ($fechaQuinquenio==10) | ($fechaQuinquenio==15) | ($fechaQuinquenio==20) |
                ($fechaQuinquenio==25) | ($fechaQuinquenio==30) | ($fechaQuinquenio==35) | ($fechaQuinquenio==40) |
                ($fechaQuinquenio==45) | ($fechaQuinquenio==50))
            checked="checked"
        @else @endif
        @else
            {{ old('quinquenioAplica') }}
            @endif

            >
            <label class="custom-control-label" for="switchQAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="">Quinquenio</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="quinquenioEntrega" class="custom-control-input" id="switchQEntrega" @if (isset($fechaQuinquenio))  @if ((!$fechaQuinquenio==5) | (!$fechaQuinquenio==10) | (!$fechaQuinquenio==15) | (!$fechaQuinquenio==20)
                | (!$fechaQuinquenio==25) | (!$fechaQuinquenio==30) | (!$fechaQuinquenio==35) | (!$fechaQuinquenio==40)
                | (!$fechaQuinquenio==45) | (!$fechaQuinquenio==50))
            disabled
        @else @endif
        @else
            {{ old('quinquenioAplica') }}
            @endif

            >
            <label class="custom-control-label" for="quinquenioEntrega">Entregado</label>
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="inputFechaIngreso">Fecha de Ingreso</label>
        <input type="date" min="1961-08-29" max="" name="fecha_ingreso" class="form-control" id="inputFechaIngreso"
            value="{{ isset($datosColaborador->fecha_ingreso) ? $datosColaborador->fecha_ingreso : old('fecha_ingreso') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputQText">Quinquenio</label>
        <input type="text" name="yearQuinquenio" class="form-control" id="inputQText" readonly
            value="{{ isset($fechaQuinquenio) ? $fechaQuinquenio : old('yearQuinquenio') }} Año(s)">
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-2 text-center">
        <label for="DNAplica">Día del Niño</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DNAplica" class="custom-control-input" id="switchDNAplica" @if (isset($datosColaborador))  @if ($datosColaborador->paternidad==1)
            checked="checked"
        @else
            disabled @endif
        @else
            {{ old('DNAplica') }}
            @endif

            >
            <label class="custom-control-label" for="switchDNAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="DNEntregado">Día del Niño</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DNEntregado" class="custom-control-input" id="switchDNEntregado" @if (isset($colaboradorEvento[0]))  @if ($colaboradorEvento[0]->entrega==1)
            checked="checked"
        @else
            @if ($datosColaborador->paternidad == 0)
                disabled @endif
            @endif
        @else
            disabled
            @endif

            >
            <label class="custom-control-label" for="switchDNEntregado">Entregado</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="DMAplica">Día de la Madre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DMAplica" class="custom-control-input" id="switchDMAplica" 
            @if (isset($datosColaborador))  
            @if ($datosColaborador->paternidad==1 && $datosColaborador->genero==2)
            checked="checked"
        @else
            disabled 
            @endif
        @else
            {{ old('DMAplica') }}
            @endif
            >
            <label class="custom-control-label" for="switchDMAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día de la Madre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DMEntregado" class="custom-control-input" id="switchDMEntregado" 
            @if (isset($colaboradorEvento[1]))  
            @if ($colaboradorEvento[1]->entrega==1)
            checked="checked"
        @else
            @if ($datosColaborador->paternidad == 1 && $datosColaborador->genero == 2)
                disabled @endif
            @endif
        @else
            disabled
            @endif

            >
            <label class="custom-control-label" for="switchDMEntregado">Entregado</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Padre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DPAplica" class="custom-control-input" id="switchDPAplica" 
            @if (isset($datosColaborador))  
            @if ($datosColaborador->paternidad==1 && $datosColaborador->genero==1)
            checked="checked"
        @else
            disabled
            @endif
        @else
            {{ old('DPAplica') }}
            @endif
            >
            <label class="custom-control-label" for="switchDPAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Padre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="DPEntregado" class="custom-control-input" id="switchDPEntregado" 
            @if (isset($colaboradorEvento[2]))  
            @if ($colaboradorEvento[2]->entrega==1)
            checked="checked"
        @else
        @if ($datosColaborador->paternidad == 1 && $datosColaborador->genero == 2)
        disabled @endif
    @endif
        @else
            disabled
            @endif

            >
            <label class="custom-control-label" for="switchDPEntregado">Entregado</label>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Útiles Escolares</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="UEAplica" class="custom-control-input" id="switchUEAplica" 
            @if (isset($colaboradorEvento[3]))  
            @if ($colaboradorEvento[3]->aplica==1)
            checked="checked"
        @else
            {{ old('UEAplica') }} @endif
        @else
            {{ old('UEAplica') }}
            @endif

            >
            <label class="custom-control-label" for="switchUEAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Útiles Escolares</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="UEEntregado" class="custom-control-input" id="switchUEEntregado" 
            @if (isset($colaboradorEvento[3]))  
            @if ($colaboradorEvento[3]->entrega==1)
            checked="checked"
        @else
            {{ old('UEEntregado') }} @endif
        @else
            {{ old('UEEntregado') }}
            @endif

            >
            <label class="custom-control-label" for="switchUEEntregado">Entregado</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Regalo 60 Aniversario</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="R60Aplica" class="custom-control-input" id="switchR60Aplica"
            checked="checked"
            disabled

            >
            <label class="custom-control-label" for="switchR60Aplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Regalo 60 Aniversario</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="R60Entregado" class="custom-control-input" id="switchR60Entregado" @if (isset($colaboradorEvento[4]))  @if ($colaboradorEvento[4]->entrega==1)
            checked="checked"
            disabled
        @else
            {{ old('R60Entregado') }} @endif
        @else
            {{ old('R60Entregado') }}
            @endif

            >
            <label class="custom-control-label" for="switchR60Entregado">Entregado</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Boleto Fiesta Fin de Año</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="BFFAplica" class="custom-control-input" id="switchBFFAplica"
            checked="checked"
            disabled
            >
            <label class="custom-control-label" for="switchBFFAplica">Aplica</label>
        </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Boleto Fiesta Fin de Año</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="BFFEntregado" class="custom-control-input" id="switchBFFEntregado" @if (isset($colaboradorEvento[5]))  @if ($colaboradorEvento[5]->entrega==1)
            checked="checked"
        @else
            {{ old('BFFEntregado') }} @endif
        @else
            {{ old('BFFEntregado') }}
            @endif

            >
            <label class="custom-control-label" for="switchBFFEntregado">Entregado</label>
        </div>
    </div>
</div>
@else

{{-- Formulario Registro --}}

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputFechaIngreso">Fecha de Ingreso</label>
        <input type="date" min="1961-08-29" max="" name="fecha_ingreso" class="form-control" id="inputFechaIngreso"
            value="{{ isset($datosColaborador->fecha_ingreso) ? $datosColaborador->fecha_ingreso : old('fecha_ingreso') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="selectNivel">Puesto</label>
        <select id="selectNivel" name="puesto" class="form-control">

            @foreach ($puestos as $puesto)
                @if (isset($datosColaborador->puesto))
                    @if ($datosColaborador->puesto == $puesto->idPuesto)
                        <option value="{{ $puesto->idPuesto }}" selected="selected">{{ $puesto->nombre_nivel }}
                            {{ $puesto->especialidad_puesto }}
                        </option>
                    @else
                        <option value="{{ $puesto->idPuesto }}">{{ $puesto->nombre_nivel }}
                            {{ $puesto->especialidad_puesto }}
                        </option>
                    @endif
                @else
                    <option value="{{ $puesto->idPuesto }}">{{ $puesto->nombre_nivel }}
                        {{ $puesto->especialidad_puesto }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="selectArea">Area</label>
        <select id="selectArea" name="area" class="form-control">
            @foreach ($areas as $area)
                @if (isset($datosColaborador->area))
                    @if ($datosColaborador->area == $area->idArea)
                        <option value="{{ $area->idArea }}" selected="selected">{{ $area->nombre_area }}</option>
                    @else
                        <option value="{{ $area->idArea }}">{{ $area->nombre_area }}</option>
                    @endif
                @else
                    <option value="{{ $area->idArea }}">{{ $area->nombre_area }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="selectSupervisor">Supervisor</label>
        <select id="selectSupervisor" name="supervisor" class="form-control">
            <option value=""></option>
            @foreach ($supervisores as $supervisor)
                @if (isset($datosColaborador->supervisor))
                    @if ($datosColaborador->supervisor == $supervisor->no_colaborador)
                        <option value="{{ $supervisor->no_colaborador }}" selected="selected">{{ $supervisor->nombre }}
                            {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                        </option>
                    @else
                        <option value="{{ $supervisor->no_colaborador }}">{{ $supervisor->nombre }}
                            {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                        </option>
                    @endif
                @else
                    <option value="{{ $supervisor->no_colaborador }}">{{ $supervisor->nombre }}
                        {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputTelFijo">Teléfono Fijo</label>
        <input type="text" name="tel_fijo" class="form-control" id="inputTelFijo" placeholder="Teléfono Fijo"
            value="{{ isset($datosColaborador->tel_fijo) ? $datosColaborador->tel_fijo : old('tel_fijo') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="inputTelMovil">Teléfono Móvil</label>
        <input type="text" name="tel_movil" class="form-control" id="inputTelMovil" placeholder="Teléfono Móvil"
            value="{{ isset($datosColaborador->tel_movil) ? $datosColaborador->tel_movil : old('tel_movil') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="inputExtension">Extensión</label>
        <select id="inputExtension" name="extension" class="form-control">
            @foreach ($extensiones as $ext)
                @if (isset($datosColaborador->extension))
                    @if ($datosColaborador->extension == $ext->idExtension)
                        <option value="{{ $ext->idExtension }}" selected="selected">{{ $ext->numero_extension }}
                        </option>
                    @else
                        <option value="{{ $ext->idExtension }}">{{ $ext->numero_extension }}</option>
                    @endif
                @else
                    <option value="{{ $ext->idExtension }}">{{ $ext->numero_extension }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="inputClaveRadio">Clave de Radio</label>
        <select id="inputClaveRadio" name="clave_radio" class="form-control">
            @foreach ($clavesRadio as $clave)
                @if (isset($datosColaborador->clave_radio))
                    @if ($datosColaborador->clave_radio == $clave->idClave_Radio)
                        <option value="{{ $clave->idClave_Radio }}" selected="selected">{{ $clave->clave }}</option>
                    @else
                        <option value="{{ $clave->idClave_Radio }}">{{ $clave->clave }}</option>
                    @endif
                @else
                    <option value="{{ $clave->idClave_Radio }}">{{ $clave->clave }}</option>
                @endif
            @endforeach

        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputMatriculacion">Matriculación</label>
        <select id="inputMatriculacion" name="matriculacion" class="form-control">
            @if (isset($datosColaborador->matriculacion))
                @if ($datosColaborador->matriculacion == 1)
                    <option value="1" selected="selected">Si</option>
                    <option value="0">No</option>
                @elseif ($datosColaborador->matriculacion == 0)
                    <option value="1">Si</option>
                    <option value="0" selected="selected">No</option>
                @endif
            @else
                <option value="1">Si</option>
                <option value="0">No</option>
            @endif

        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="inputTipoUsuario">Tipo de Usuario</label>
        <select id="inputTipoUsuario" name="tipo_usuario" class="form-control">
            @if (isset($datosColaborador->tipo_usuario))
                @if ($datosColaborador->tipo_usuario == 1)
                    <option value="1" selected="selected">Staff</option>
                    <option value="2">Directivo</option>
                    <option value="3">Sindical</option>
                @elseif ($datosColaborador->tipo_usuario == 2)
                    <option value="1">Staff</option>
                    <option value="2" selected="selected">Directivo</option>
                    <option value="3">Sindical</option>
                @elseif ($datosColaborador->tipo_usuario == 3)
                    <option value="1">Staff</option>
                    <option value="2">Directivo</option>
                    <option value="3" selected="selected">Sindical</option>
                @endif
            @else
                <option value="1">Staff</option>
                <option value="2">Directivo</option>
                <option value="3">Sindical</option>
            @endif
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword">Contraseña Factor</label>
        <input type="text" name="password" class="form-control" id="inputPassword" placeholder="Contraseña"
            value="{{ isset($datosColaborador->password) ? $datosColaborador->password : old('password') }}">
    </div>
</div>


@endif


<div class="form-row">
    <div class="form-group col-md-6 d-flex justify-content-start">
        <a href="{{ url('empleado/consulta') }}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="form-group col-md-6 d-flex justify-content-end">
        <input type="submit" value="{{ $modo }} colaborador" class="btn btn-success">
    </div>
</div>
</div>
</div>

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_ingreso")[0].setAttribute('max', today);

</script>
<script>
    var after = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_ingreso")[0].setAttribute('min', '1969-08-29');

</script>
<script>
    var fnMax = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_nacimiento")[0].setAttribute('max', '2003-01-01');

</script>
<script>
    var fnMin = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_nacimiento")[0].setAttribute('min', '1959-01-01');

</script>
