<?php
require_once '../model/Responsavel.php';
require_once '../model/Tarefa.php';
require_once '../dao/Conexao.php';
require_once '../dao/ResponsavelDao.php';
require_once '../dao/TarefaDao.php';
require_once '../controller/ResponsavelController.php';
require_once '../controller/TarefaController.php';

use Controller\TarefaController;
use Controller\ResponsavelController;

// Precisamos dos responsáveis para preencher o select/combobox
$respController = new ResponsavelController();
$responsaveis = $respController->listar();

// Controla o cadastro da tarefa
$tarefaController = new TarefaController();
$tarefaController->cadastrar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Tarefa</title>
</head>
<body>
    <hr>
<a href="../index.php">🏠 Voltar para o Menu Principal</a>
    <h1>Cadastrar Nova Tarefa</h1>

    <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">Erro: A descrição da tarefa é obrigatória!</p>
    <?php endif; ?>

    <form action="TarefaCadastro.php" method="POST">
        <label for="descricao">Descrição da Tarefa:</label><br>
        <input type="text" id="descricao" name="descricao" required><br><br>

        <label for="responsavel_id">Responsável:</label><br>
        <select id="responsavel_id" name="responsavel_id">
            <option value="">-- Selecione um Responsável (Opcional) --</option>
            <?php foreach ($responsaveis as $resp): ?>
                <option value="<?php echo $resp->getId(); ?>">
                    <?php echo $resp->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Salvar Tarefa</button>
    </form>

    <br>
    <a href="TarefaLista.php">Voltar para a Listagem</a>
</body>
</html>