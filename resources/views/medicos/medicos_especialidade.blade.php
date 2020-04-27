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
            <td colspan="2" align="center">
                <h3>Relatório de Médico por Especialidade</h3>
            </td>
            <td colspan="2" align="right">Data: {{date('d/m/Y')}}</td>
        </tr>

        <tr>
            <td style="font-weight: bold" width="200px">Médico</td>
            <td style="font-weight: bold" width="400px">Especialidade</td>
        </tr>

        @foreach ($medicos as $medico)
        <tr>
            <td> {{ $medico->nome }} </td>
            <td> {{ $medico->nome_especialidade }} </td>
        </tr>
        @endforeach
    </table>
</body>

</html>