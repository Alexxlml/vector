@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (Session::has('alertSuccess'))
                <div class="alert alert-success alert-dismissible container" role="alert">
                    {{ Session::get('alert') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has('alert'))
                <div class="alert alert-danger alert-dismissible container" role="alert">
                    {{ Session::get('alert') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @include('empleado.form',['modo'=>'Crear'])
        </form>
    </div>
@endsection
