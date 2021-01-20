<h1>{{ $modo }} colaborador</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-row">
    <div class="form-group custom-file col-md-12">
        <input type="file" name="Foto" class="custom-file-input" id="customFile">
        <label class="custom-file-label" id="fileLabel" for="customFile">Elegir un archivo</label>
        @if(isset($empleado->Foto))
            <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt=""
                class="img-fluid rounded shadow border border-secondary">
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputNoColaborador">Número de colaborador</label>
      <input type="text" class="form-control" id="inputNoColaborador" placeholder="Número de colaborador">
    </div>
    <div class="form-group col-md-3">
      <label for="inputNombre">Nombre(s)</label>
      <input type="text" id="inputNombre" placeholder="Nombre"
        value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" class="form-control">
    </div>
    <div class="form-group col-md-3">
        <label for="inputApPaterno">Apellido Paterno</label>
        <input type="text" id="inputApPaterno" placeholder="Apellido Paterno"
        value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}"
        class="form-control">
      </div>
      <div class="form-group col-md-3">
        <label for="inputApMaterno">Apellido Materno</label>
        <input type="text" id="inputApMaterno" placeholder="Apellido Materno"
        value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}"
        class="form-control">
      </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputGenero">Género</label>
        <select id="inputGenero" class="form-control">
            <option>Masculino</option>
            <option>Femenino</option>
            <option>No Binario</option>
          </select>
      </div>
    <div class="form-group col-md-3">
        <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="inputFechaNacimiento">
    </div>
    <div class="form-group col-md-3">
        <label for="inputHijos">¿Tiene Hijos?</label>
        <select id="inputHijos" class="form-control">
            <option>No</option>
            <option>Si</option>
          </select>
      </div>
      <div class="form-group col-md-3">
        <label for="inputNumHijos">Número de Hijos y edades</label>
        <input type="text" class="form-control" id="inputSupervisor" placeholder="2-10,8,9">
      </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputTipoCol">Tipo de Colaborador</label>
        <select id="inputTipoCol" class="form-control">
            <option>Operativo</option>
            <option>Administrativo</option>
            <option>Talento</option>
          </select>
      </div>
      <div class="form-group col-md-3">
        <label for="inputTurno">Turno del Colaborador</label>
        <select id="inputTurno" class="form-control">
            <option>Matutino</option>
            <option>Vespertino</option>
            <option>Nocturno</option>
            <option>Mixto</option>
          </select>
      </div>
      <div class="form-group col-md-3">
        <label for="inputCorreo">Correo</label>
        <input type="email" name="Correo" placeholder="Correo" id="inputCorreo"
            value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" class="form-control">
    </div>
      <div class="form-group col-md-3">
        <label for="inputRuta">Ruta de Transporte</label>
        <select id="inputRuta" class="form-control">
            <option>Temixco</option>
          </select>
      </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label for="selectNivel">Puesto - Nivel</label>
      <select id="selectNivel" class="form-control">
        <option>Auxiliar</option>
      </select>
    </div>
    <div class="form-group col-md-3">
        <label for="selectNivel">Puesto - Especialidad</label>
        <select id="selectEspecialidad" class="form-control">
          <option>administrativo de comunicación</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="selectArea">Area</label>
        <select id="selectArea" class="form-control">
          <option>Gerencia de capital humano</option>
        </select>
      </div>
    <div class="form-group col-md-3">
      <label for="inputSupervisor">Supervisor</label>
      <input type="text" class="form-control" id="inputSupervisor" placeholder="Supervisor">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputTelFijo">Teléfono Fijo</label>
        <input type="text" class="form-control" id="inputTelFijo" placeholder="Teléfono Fijo">
      </div>
      <div class="form-group col-md-3">
        <label for="inputTelMovil">Teléfono Móvil</label>
        <input type="text" class="form-control" id="inputTelMovil" placeholder="Teléfono Móvil">
      </div>
      <div class="form-group col-md-3">
        <label for="inputExtension">Extensión</label>
        <select id="inputExtension" class="form-control">
            <option>174</option>
          </select>
      </div>
      <div class="form-group col-md-3">
        <label for="inputClaveRadio">Clave de Radio</label>
        <select id="inputClaveRadio" class="form-control">
            <option>Antimonio</option>
          </select>
      </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputMatriculacion">Matriculación</label>
        <select id="inputMatriculacion" class="form-control">
            <option>Si</option>
            <option>No</option>
          </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputTipoUsuario">Tipo de Usuario</label>
        <select id="inputTipoUsuario" class="form-control">
            <option>Staff</option>
            <option>Directivo</option>
            <option>Sindical</option>
          </select>
      </div>
        <div class="form-group col-md-4">
            <label for="inputPassword">Contraseña</label>
            <input type="text" class="form-control" id="inputPassword" placeholder="Contraseña">
        </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Autoevaluación</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchAEvalGen">
            <label class="custom-control-label" for="switchAEvalGen">Generada</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Autoevaluación</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchAEvalAsig">
            <label class="custom-control-label" for="switchAEvalAsig">Asignada</label>
          </div>
    </div>

    <div class="form-group col-md-2">
        <label for="inputCalAEval">Calificación</label>
        <input type="text" class="form-control" id="inputCalAEval" placeholder="Calificación">
    </div>

    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Evaluación</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchEvalGen">
            <label class="custom-control-label" for="switchEvalGen">Generada</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Evaluación</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchEvalAsig">
            <label class="custom-control-label" for="switchEvalAsig">Asignada</label>
          </div>
    </div>
    <div class="form-group col-md-2">
        <label for="inputCalEval">Calificación</label>
        <input type="text" class="form-control" id="inputCalEval" placeholder="Calificación">
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Quinquenio</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchQAplica">
            <label class="custom-control-label" for="switchQAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Quinquenio</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchQEntrega">
            <label class="custom-control-label" for="switchQEntrega">Entregado</label>
          </div>
    </div>

    <div class="form-group col-md-4">
        <label for="inputFechaIngreso">Fecha de Ingreso</label>
        <input type="date" class="form-control" id="inputFechaIngreso">
    </div>
    <div class="form-group col-md-4">
        <label for="inputQText">Quinquenio</label>
        <input type="text" class="form-control" id="inputQText" placeholder="5 Años">
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Niño</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDNAplica">
            <label class="custom-control-label" for="switchDNAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Niño</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDNEntregado">
            <label class="custom-control-label" for="switchDNEntregado">Entregado</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día de la Madre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDMAplica">
            <label class="custom-control-label" for="switchDMAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día de la Madre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDMEntregado">
            <label class="custom-control-label" for="switchDMEntregado">Entregado</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Padre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDPAplica">
            <label class="custom-control-label" for="switchDPAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Día del Padre</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchDPEntregado">
            <label class="custom-control-label" for="switchDPEntregado">Entregado</label>
          </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Útiles Escolares</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchUEAplica">
            <label class="custom-control-label" for="switchUEAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Útiles Escolares</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchUEEntregado">
            <label class="custom-control-label" for="switchUEEntregado">Entregado</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Regalo 60 Aniversario</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchR60Aplica">
            <label class="custom-control-label" for="switchR60Aplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Regalo 60 Aniversario</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchR60Entregado">
            <label class="custom-control-label" for="switchR60Entregado">Entregado</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Boleto Fiesta Fin de Año</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchBFFAplica">
            <label class="custom-control-label" for="switchBFFAplica">Aplica</label>
          </div>
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="inputPassword">Boleto Fiesta Fin de Año</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switchBFFEntregado">
            <label class="custom-control-label" for="switchBFFEntregado">Entregado</label>
          </div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6 d-flex justify-content-start">
        <a href="{{ url('empleado/') }}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="form-group col-md-6 d-flex justify-content-end">
        <input type="submit" value="{{ $modo }} datos" class="btn btn-success">
    </div>
</div>



