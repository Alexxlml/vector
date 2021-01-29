@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- <a href="{{ url('colaborador/create') }}" class="btn btn-success">Registrar nuevo
            colaborador</a> --}}
        <div class="card">
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
            <div class="card-body">
                <table id="general" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No. de Colaborador</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">A. Paterno</th>
                            <th class="text-center">A. Materno</th>
                            <th class="text-center">Fecha de Ingreso</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                            <tr>
                                <td class="text-center">{{ $colaborador->no_colaborador }}</td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <img style="width: 70px" src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                            alt="" class="img-fluid rounded shadow border border-secondary">
                                    </div>
                                </td>

                                <td class="text-center">
                                    {{ $colaborador->nombre }}
                                </td>
                                <td class="text-center">{{ $colaborador->ap_paterno }}</td>
                                <td class="text-center">{{ $colaborador->ap_materno }}</td>
                                <td class="text-center">{{ $colaborador->fecha_ingreso }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/empleado/' . $colaborador->no_colaborador . '/edit') }}"
                                        class="btn btn-primary">
                                        Mostrar
                                    </a>

                                    {{-- <form
                                        action="{{ url('/colaborador/' . $colaborador->id) }}" class="d-inline"
                                        method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" onclick="return confirm('¿Quieres borrar?')"
                                            class="btn btn-danger" value="Borrar">
                                    </form> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#general').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ colaboradores por página",
                    "zeroRecords": "No se ha encontrado el colaborador - Lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay colaboradores disponibles",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });

    </script>
@endsection
