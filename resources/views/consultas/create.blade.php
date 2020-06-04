@extends('layouts.app')

@section('content')
<h1 class="text-center"> @if(isset($consultas)) Editar Consulta @else Cadastrar Consulta @endif</h1>


@if(isset($errors) && count($errors)>0)
<div class="textcenter mt-4 mb-4 p-2 alert-danger">
    @foreach($errors->all() as $erro)
    {{$erro}} <br>
    @endforeach
</div>
@endif


<div class="col-8 m-auto">
    @if(isset($consultas))
    <form name="formEdit" id="formEdit" method="post" action={{url("consulta/$consultas->id")}}>
        @method('PATCH')
        @else
        <form name="formCad" id="formCad" method="post" action="{{url('consulta')}}">
            @endif
            @csrf
            <input class="form-control" type="datetime" name="data" id="data" placeholder="Data" value="{{ $consultas->data ?? ''}}" required><br>
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$consultas->descricao ?? ''}}"><br>
            <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor" value="{{$consultas->valor ?? ''}}"><br>

            <select class="form-control" name="status" id="status">
                <option value="0" @if( isset($consultas) && $consultas->status == 0) ? selected @endif>Não realizada</option>
                <option value="1" @if( isset($consultas) && $consultas->status == 1) ? selected @endif>Realizada</option>
            </select><br>

            <select class="form-control" name="medico_id" id="medico_id">
                @foreach($medicos ?? '' as $medico)
                <option value="{{ $medico->id }}" @if( isset($consultas) && $medico->id == $consultas->medico_id) selected @endif>{{ $medico->nome }}</option>
                @endforeach
            </select><br>

            <select class="form-control" name="paciente_id" id="paciente_id">
                @foreach($pacientes ?? '' as $paciente)
                <option value="{{ $paciente->id }}" @if( isset($consultas) && $paciente->id == $consultas->paciente_id) selected @endif>{{ $paciente->nome }}</option>
                @endforeach
            </select><br>

            <input class="btn btn-primary" type="submit" value="Salvar"><br>
        </form>
</div>
@endsection