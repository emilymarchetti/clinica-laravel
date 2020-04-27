@extends('layouts.app')

@section('content')
<h1 class="text-center"> Visualizar Dados </h1>

<div class="col-8 m-auto">
    Id: {{$pacientes->id}} <br>
    Nome: {{$pacientes->nome}} <br>
    Data de Nascimento: {{date('d/m/Y', strtotime($pacientes->data_nascimento))}} <br>
    CPF: {{$pacientes->cpf}} <br>
    RG: {{$pacientes->rg}} <br>
    Telefone: {{$pacientes->fone}} <br>
    E-mail : {{$pacientes->email}}
</div>
@endsection