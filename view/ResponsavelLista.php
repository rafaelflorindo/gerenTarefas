<?php
require_once '../model/Responsavel.php';
require_once '../dao/Conexao.php';
require_once '../dao/ResponsavelDao.php';
require_once '../controller/ResponsavelController.php';

use Controller\ResponsavelController;

$controller = new ResponsavelController();
$responsaveis = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Responsáveis</title>
</head>
<body>
    <hr>
<a href="../index.php">🏠 Voltar para o Menu Principal</a>
    <h1>Responsáveis Cadastrados</h1>

    <?php if (isset($_GET['sucesso'])): ?>
        <p style="color: green;">Responsável salvo con sucesso!</p>
    <?php endif; ?>

    <a href="ResponsavelCadastro.php">Cadastrar Novo Responsável</a> | 
    <a href="TarefaLista.php">Ver Tarefas</a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($responsaveis)): ?>
                <tr>
                    <td colspan="3">Nenhum responsável cadastrado.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($responsaveis as $resp): ?>
                    <tr>
                        <td><?php echo $resp->getId(); ?></td>
                        <td><?php echo $resp->getNome(); ?></td>
                        <td><?php echo $resp->getEmail(); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>