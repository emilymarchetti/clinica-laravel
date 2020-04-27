<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td align="center">
                <h3>Relatório de Consultas por Paciente</h3>
            </td>
            <td align="right">Data: {{date('d/m/Y')}}</td>
        </tr>

        <tr>
            <td style="font-weight: bold" width="250px">Paciente</td>
            <td style="font-weight: bold" width="400px">Consulta</td>
        </tr>

        @foreach ($consultas as $consulta)
        <tr>
            <td> {{ $consulta->paciente_nome }} </td>
            <td> Médico: {{ $consulta->medico_nome }} | Data: {{ date('d/m/Y H:i', strtotime($consulta->data_consulta)) }} </td>
        </tr>
        @endforeach
    </table>
</body>

</html>