@extends('layouts.app')

@section('content')
<div class="content">
    @guest
    <div>
        Por favor faça login para acessar o sistema.
    </div>
    @else
    <div class="title m-b-md">
        Home
    </div>
    <div class="links">
        <a href='{{url("paciente")}}'>Paciente</a>
        <a href='{{url("medico")}}'>Médico</a>
        <a href='{{url("especialidade")}}'>Especialidade</a>
        <a href='{{url("consulta")}}'>Consulta</a>
        <!-- <a href="https://github.com/laravel/laravel">GitHub</a> -->
    </div>
    @endguest
</div>
@endsection