<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
            color: #333;
        }
        h1 {
            color: #2c3e50;
        }
        .menu {
            margin-top: 20px;
        }
        .menu-item {
            display: inline-block;
            margin-right: 15px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .menu-item:hover {
            background-color: #2980b9;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Sistema Gerenciador de Tarefas</h1>
        <p>Seja bem-vindo ao sistema de controle de atividades. Selecione uma das opções abaixo para navegar:</p>
        
        <div class="menu">
            <a href="view/TarefaLista.php" class="menu-item">📋 Listar Tarefas</a>
            <a href="view/TarefaCadastro.php" class="menu-item">➕ Nova Tarefa</a>
            <a href="view/ResponsavelLista.php" class="menu-item">👥 Listar Responsáveis</a>
            <a href="view/ResponsavelCadastro.php" class="menu-item">👤 Novo Responsável</a>
        </div>
    </div>

</body>
</html>