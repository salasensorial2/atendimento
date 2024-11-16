<!DOCTYPE html>
<html lang="pt-br" font-size="4">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Atendimentos</title>
</head>
<body>
    <h2>Relatório de Atendimentos Sala Sensorial / ALECE</h2>
    <table border="1" cellpadding="5" cellspacing="0" font-size="4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Solicitante</th>
                <th>Data do Atendimento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atendimentos as $atendimento)
                <tr>
                    <td>{{ $atendimento->id }}</td>
                    <td>{{ $atendimento->nome }}</td>
                    <td>{{ $atendimento->cpf }}</td>
                    <td>{{ $atendimento->solicitante }}</td>
                    <td>{{ \Carbon\Carbon::parse($atendimento->dia_atual)->format('d/m/Y') }}</td> <!-- Formato de data -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
