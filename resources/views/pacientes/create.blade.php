@extends('layouts.app')

@section('content')
<h1 class="text-center"> @if(isset($pacientes)) Editar Paciente @else Cadastrar Paciente @endif</h1>


@if(isset($errors) && count($errors)>0)
<div class="textcenter mt-4 mb-4 p-2 alert-danger">
    @foreach($errors->all() as $erro)
    {{$erro}} <br>
    @endforeach
</div>
@endif


<div class="col-8 m-auto">
    @if(isset($pacientes))
    <form name="formEdit" id="formEdit" method="post" action={{url("paciente/$pacientes->id")}}>
        @method('PATCH')
        @else
        <form name="formCad" id="formCad" method="post" action="{{url('paciente')}}">
            @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{$pacientes->nome ?? ''}}" required><br>
            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" value="@if (isset($pacientes)){{ date('Y-m-d', strtotime($pacientes->data_nascimento)) }}@endif" required><br>
            <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" value="{{$pacientes->cpf ?? ''}}" maxlength="11" minlength="11" required><br>
            <input class="form-control" type="text" name="rg" id="rg" placeholder="RG" value="{{$pacientes->rg ?? ''}}" required><br>
            <input class="form-control" type="number" name="fone" id="fone" placeholder="Telefone" value="{{$pacientes->fone ?? ''}}" required><br>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$pacientes->email ?? ''}}"><br>
            <input class="btn btn-primary" type="submit" value="Salvar"><br>
        </form>
</div>
@endsection