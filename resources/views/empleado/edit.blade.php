@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/empleado/'.$datosColaborador->no_colaborador) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('empleado.form',['modo'=>'Editar'])
</form>
</div>
@endsection