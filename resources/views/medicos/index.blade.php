@extends('layouts.app')

@section('content')
<h1 class="text-center"> Médico </h1>
<div class="text-center mt-3 mb-4">
    <a href="{{url('/')}}">
        <button class="btn btn-primary">Home</button>
    </a>
    <a href="{{url('medico/create')}}">
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
                <th scope="col">Especialidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos ?? '' as $medico)
            <tr>
                <th scope="row">{{$medico->id}}</th>
                <td>{{$medico->nome}}</td>
                <td>{{$medico->fone}}</td>
                <td>{{$medico->especialidade->nome}}</td>
                <td>
                    <a href={{url("medico/$medico->id")}}>
                        <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href={{url("medico/$medico->id/edit")}}>
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href={{url("medico/$medico->id")}} class="js-del-medico">
                        <button class="btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection