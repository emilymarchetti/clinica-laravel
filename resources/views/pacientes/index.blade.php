@extends('layouts.app')

@section('content')
<h1 class="text-center"> Paciente </h1>
<div class="text-center mt-3 mb-4">
    <a href="{{url('/')}}">
        <button class="btn btn-primary">Home</button>
    </a>
    <a href="{{url('paciente/create')}}">
        <button class="btn btn-success">Cadastrar</button>
    </a>
</div>
<div class="col-8 m-auto">
    @csrf
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes ?? '' as $paciente)
            <tr>
                <th scope="row">{{$paciente->id}}</th>
                <td>{{$paciente->nome}}</td>
                <td>{{$paciente->fone}}</td>
                <td> {{ date('d/m/Y', strtotime($paciente->data_nascimento))}}</td>
                <td>
                    <a href={{url("paciente/$paciente->id")}}>
                        <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href={{url("paciente/$paciente->id/edit")}}>
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href={{url("paciente/$paciente->id")}} class="js-del-paciente">
                        <button class="btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection