@extends('layouts.app')

@section('content')
<h1 class="text-center"> @if(isset($medicos)) Editar Médico @else Cadastrar Médico @endif</h1>


@if(isset($errors) && count($errors)>0)
<div class="textcenter mt-4 mb-4 p-2 alert-danger">
    @foreach($errors->all() as $erro)
    {{$erro}} <br>
    @endforeach
</div>
@endif


<div class="col-8 m-auto">
    @if(isset($medicos))
    <form name="formEdit" id="formEdit" method="post" action={{url("medico/$medicos->id")}}>
        @method('PATCH')
        @else
        <form name="formCad" id="formCad" method="post" action="{{url('medico')}}">
            @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{$medicos->nome ?? ''}}" required><br>
            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" value="@if (isset($medicos)){{ date('Y-m-d', strtotime($medicos->data_nascimento)) }}@endif" required><br>
            <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" value="{{$medicos->cpf ?? ''}}" required><br>
            <input class="form-control" type="text" name="rg" id="rg" placeholder="RG" value="{{$medicos->rg ?? ''}}" required><br>
            <input class="form-control" type="number" name="crm" id="crm" placeholder="CRM" value="{{$medicos->crm ?? ''}}" required><br>
            <input class="form-control" type="number" name="fone" id="fone" placeholder="Telefone" value="{{$medicos->fone ?? ''}}" required><br>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$medicos->email ?? ''}}"><br>
            <select class="form-control" name="especialidade_id" id="especialidade_id">
                @foreach($especialidades ?? '' as $especialidade)
                <option value="{{ $especialidade->id }}" @if( isset($especialidades) && isset($medicos) && $medicos->especialidade_id == $especialidade->id) selected @endif>{{ $especialidade->nome }}</option>
                @endforeach
            </select><br>
            <input class="btn btn-primary" type="submit" value="Salvar"><br>
        </form>
</div>
@endsection