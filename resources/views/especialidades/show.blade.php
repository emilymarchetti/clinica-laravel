@extends('layouts.app')

@section('content')
<h1 class="text-center"> Visualizar Dados </h1>

<div class="col-8 m-auto">
    Id: {{$especialidades->id}} <br>
    Nome: {{$especialidades->nome}} <br>
</div>
@endsection