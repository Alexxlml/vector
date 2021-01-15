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

<div class="form-group">
    <input type="text" name="Nombre" placeholder="Nombre"
        value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" class="form-control">
</div>
<div class="form-group">
    <input type="text" name="ApellidoPaterno" placeholder="Apellido Paterno"
        value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}"
        class="form-control">
</div>
<div class="form-group">
    <input type="text" name="ApellidoMaterno" placeholder="Apellido Materno"
        value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}"
        class="form-control">
</div>
<div class="form-group">
    <input type="email" name="Correo" placeholder="Correo"
        value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" class="form-control">
</div>
<div class="form-group">
    <input type="file" name="Foto">
    @if(isset($empleado->Foto))
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt=""
            class="img-fluid rounded shadow border border-secondary">
    @endif
</div>
<div class="form-group">
    <input type="submit" value="{{ $modo }} datos" class="btn btn-success">
    <a href="{{ url('empleado/') }}" class="btn btn-secondary">Regresar</a>
</div>
