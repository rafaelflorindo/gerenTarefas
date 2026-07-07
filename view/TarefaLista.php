<?php
require_once '../model/Responsavel.php';
require_once '../model/Tarefa.php';
require_once '../dao/Conexao.php';
require_once '../dao/ResponsavelDao.php';
require_once '../dao/TarefaDao.php';
require_once '../controller/TarefaController.php';

use Controller\TarefaController;

$controller = new TarefaController();
$tarefas = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <a href="../index.php" class="btn-link btn-secondary" style="margin-bottom: 20px;">🏠 Voltar para o Menu Principal</a>

    <div class="container" style="max-width: 800px; margin: 0 0 20px 0;">
        <h1>Lista de Tarefas</h1>

        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alert-success">
                Tarefa salva com sucesso!
            </div>
        <?php endif; ?>

        <div class="submenu" style="margin-bottom: 25px;">
            <a href="TarefaCadastro.php" class="btn-link">➕ Cadastrar Nova Tarefa</a>
            <a href="ResponsavelLista.php" class="btn-link btn-secondary" style="margin-left: 10px;">👤 Ver Responsáveis</a>
        </div>

        <table class="table-data">
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 50%;">Descrição</th>
                    <th style="width: 40%;">Responsável Encarregado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tarefas)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center; color: #7f8c8d; padding: 20px;">
                            Nenhuma tarefa encontrada.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tarefas as $tarefa): ?>
                        <tr>
                            <td><strong><?php echo $tarefa->getId(); ?></strong></td>
                            <td><?php echo $tarefa->getDescricao(); ?></td>
                            <td>
                                <?php 
                                    // Verifica se existe um objeto Responsavel associado
                                    if ($tarefa->getResponsavel() !== null) {
                                        echo $tarefa->getResponsavel()->getNome(); 
                                    } else {
                                        echo "<i style='color: #95a5a6;'>Não atribuída</i>";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>