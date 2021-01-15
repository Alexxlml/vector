@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">

            {{ Session::get('mensaje') }}


            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo colaborador</a>
    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Número de Colaborador</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido Paterno</th>
                <th class="text-center">Apellido Materno</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $empleados as $empleado )
                <tr>
                    <td class="text-center">{{ $empleado->id }}</td>

                    <td>
                        <img style="width: 150px"
                            src="{{ asset('storage').'/'.$empleado->Foto }}"
                            alt="" class="img-fluid rounded shadow border border-secondary">
                    </td>

                    <td class="text-center">{{ $empleado->Nombre }}</td>
                    <td class="text-center">{{ $empleado->ApellidoPaterno }}</td>
                    <td class="text-center">{{ $empleado->ApellidoMaterno }}</td>
                    <td class="text-center">{{ $empleado->Correo }}</td>
                    <td class="text-center">
                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}"
                            class="btn btn-warning">
                            Editar
                        </a>

                        <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline"
                            method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger"
                                value="Borrar">
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $empleados->links() !!}
</div>
@endsection
