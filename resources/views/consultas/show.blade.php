@extends('layouts.app')

@section('content')
<h1 class="text-center"> Visualizar Dados </h1>

<div class="col-8 m-auto">
    Id: {{$consultas->id}} <br>
    Médico: {{$consultas->medico->nome}} <br>
    Paciente: {{$consultas->paciente->nome}} <br>
    Data: {{date('d/m/Y H:i', strtotime($consultas->data))}} <br>
    Descrição: {{$consultas->descricao}} <br>
    Status: @if ($consultas->status == 0) Não realizada @else Realizada @endif <br>
</div>
@endsection