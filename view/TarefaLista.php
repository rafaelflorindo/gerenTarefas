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
</head>
<body>
    <hr>
<a href="../index.php">🏠 Voltar para o Menu Principal</a>
    <h1>Lista de Tarefas</h1>

    <?php if (isset($_GET['sucesso'])): ?>
        <p style="color: green;">Tarefa salva com sucesso!</p>
    <?php endif; ?>

    <a href="TarefaCadastro.php">Cadastrar Nova Tarefa</a> | 
    <a href="ResponsavelLista.php">Ver Responsáveis</a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Responsável Encarregado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($tarefas)): ?>
                <tr>
                    <td colspan="3">Nenhuma tarefa encontrada.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($tarefas as $tarefa): ?>
                    <tr>
                        <td><?php echo $tarefa->getId(); ?></td>
                        <td><?php echo $tarefa->getDescricao(); ?></td>
                        <td>
                            <?php 
                                // Verifica se existe um objeto Responsavel associado
                                if ($tarefa->getResponsavel() !== null) {
                                    echo $tarefa->getResponsavel()->getNome(); 
                                } else {
                                    echo "<i style='color: gray;'>Não atribuída</i>";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>