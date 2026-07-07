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
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo.css">
   
</head>
<body>

    <a href="../index.php" class="btn-link btn-secondary" style="margin-bottom: 20px;">🏠 Voltar para o Menu Principal</a>

    <div class="container">
        <h1>Cadastrar Nova Tarefa</h1>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert-danger">
                Erro: A descrição da tarefa é obrigatória!
            </div>
        <?php endif; ?>

        <form action="TarefaCadastro.php" method="POST">
            <div class="form-group">
                <label for="descricao">Descrição da Tarefa:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="responsavel_id">Responsável:</label>
                <select id="responsavel_id" name="responsavel_id" class="form-control">
                    <option value="">-- Selecione um Responsável (Opcional) --</option>
                    <?php foreach ($responsaveis as $resp): ?>
                        <option value="<?php echo $resp->getId(); ?>">
                            <?php echo $resp->getNome(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-link">Salvar Tarefa</button>
                <a href="TarefaLista.php" style="color: #3498db; text-decoration: none; font-weight: bold;">Voltar para a Listagem</a>
            </div>
        </form>
    </div>

</body>
</html>