@extends('layouts.app')

@section('content')
<h1 class="text-center"> Consulta </h1>
<div class="text-center mt-3 mb-4">
    <a href="{{url('/')}}">
        <button class="btn btn-primary">Home</button>
    </a>
    <a href="{{url('consulta/create')}}">
        <button class="btn btn-success">Cadastrar</button>
    </a>
</div>

<div class="text-center mt-3 mb-4">
    <select class="form-control" name="filtro" id="filtro">
        <option value="1">Tudo</option>
        <option value="2">Primeiro</option>
        <option value="3">Último</option>
        <option value="4">Ordenar por Nome Médico</option>
        <option value="5">Ordenar por Nome Paciente</option>
        <option value="6">Ordenar por Data</option>
    </select><br>
    <a href="{{url('consulta/search')}}">
        <button class="btn btn-success">Pesquisar</button>
    </a>
</div>
<div class="col-8 m-auto">
    @csrf
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Paciente</th>
                <th scope="col">Médico</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col">Valor(R$)</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
            <tr>
                <th scope="row">{{$consulta->id}}</th>
                <td>{{$consulta->paciente->nome}}</td>
                <td>{{$consulta->medico->nome}}</td>
                <td>{{ date('d/m/Y H:i', strtotime($consulta->data))}}</td>
                <td>@if ($consulta->status == 0) Não realizada @else Realizada @endif</td>
                <td>{{$consulta->valor}}</td>
                <td>
                    <a href={{url("consulta/$consulta->id")}}>
                        <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href={{url("consulta/$consulta->id/edit")}}>
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href={{url("consulta/$consulta->id")}} class="js-del-consulta">
                        <button class="btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection