@extends('layouts.app')

@section('content')
<h1 class="text-center"> Visualizar Dados </h1>

<div class="col-8 m-auto">
    Id: {{$medicos->id}} <br>
    Nome: {{$medicos->nome}} <br>
    Data de Nascimento: {{ date('d/m/Y', strtotime($medicos->data_nascimento)) }} <br>
    CPF: {{$medicos->cpf}} <br>
    RG: {{$medicos->rg}} <br>
    CRM: {{$medicos->crm}} <br>
    Telefone: {{$medicos->fone}} <br>
    E-mail : {{$medicos->email}} <br>
    Especialidade : {{$medicos->especialidade->nome}}
</div>
@endsection