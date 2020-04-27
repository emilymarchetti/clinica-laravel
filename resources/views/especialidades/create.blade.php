@extends('layouts.app')

@section('content')
<h1 class="text-center"> @if(isset($especialidades)) Editar Especialidade @else Cadastrar Especialidade @endif</h1>


@if(isset($errors) && count($errors)>0)
<div class="textcenter mt-4 mb-4 p-2 alert-danger">
    @foreach($errors->all() as $erro)
    {{$erro}} <br>
    @endforeach
</div>
@endif


<div class="col-8 m-auto">
    @if(isset($especialidades))
    <form name="formEdit" id="formEdit" method="post" action={{url("especialidade/$especialidades->id")}}>
        @method('PATCH')
        @else
        <form name="formCad" id="formCad" method="post" action="{{url('especialidade')}}">
            @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{$especialidades->nome ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="Salvar"><br>
        </form>
</div>
@endsection