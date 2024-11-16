<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Atendimento e CIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row; /* Alinhando os elementos na horizontal */
            gap: 20px;
            width: 80%;
            overflow-x: auto;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            min-width: 250px; /* Garante que o tamanho mínimo seja de 250px */
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .success-message, .error-message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
    <h1>Painel de Controle de atendimento Sala Sensorial / ALECE</h1>
</head>
<body>
    <div class="container">
        <!-- Formulário de Cadastro de Atendimento -->
        <div class="form-section">
            <h2>Cadastrar Atendimento</h2>
            <!-- Exibindo mensagens de sucesso ou erro -->
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            <form action="/cadastrar" method="POST">
                @csrf
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cpf" placeholder="CPF" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="solicitante" placeholder="Solicitante" required>
                <button type="submit">Cadastrar Atendimento</button>
            </form>
        </div>

        <!-- Formulário de Cadastro de CIN -->
        <div class="form-section">
            <h2>Cadastrar CIN</h2>
            <!-- Exibindo mensagens de sucesso ou erro -->
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            <form action="/cadastrar-cin" method="POST">
                @csrf
                <input type="text" name="cpf" placeholder="CPF da CIN" required>
                <input type="text" name="nome" placeholder="Nome" required>
                <button type="submit">Cadastrar CIN</button>
            </form>
        </div>

        <!-- Formulário de Relatórios -->
        <div class="form-section">
            <h2>Relatórios</h2>
            <form action="{{ route('relatorio.gerar') }}" method="GET" target="_blank">
                <label for="data_inicio">Data Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" required>

                <label for="data_fim">Data Fim:</label>
                <input type="date" id="data_fim" name="data_fim" required>

                <button type="submit">Gerar Relatório</button>
            </form>
        </div>
    </div>
</body>
</html>
