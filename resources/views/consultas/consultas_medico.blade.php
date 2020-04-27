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
                <h3>Relatório de Consultas por Médico</h3>
            </td>
            <td align="right">Data: {{date('d/m/Y')}}</td>
        </tr>

        <tr>
            <td style="font-weight: bold" width="200px">Médico</td>
            <td style="font-weight: bold" width="400px">Consulta</td>
        </tr>

        @foreach ($consultas as $consulta)
        <tr>
            <td> {{ $consulta->medico_nome }} </td>
            <td> Paciente: {{ $consulta->paciente_nome }} | Data: {{ date('d/m/Y H:i', strtotime($consulta->data_consulta)) }} </td>
        </tr>
        @endforeach
    </table>
</body>

</html>