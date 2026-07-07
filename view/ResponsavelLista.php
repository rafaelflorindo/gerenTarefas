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
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <a href="../index.php" class="btn-link btn-secondary" style="margin-bottom: 20px;">🏠 Voltar para o Menu Principal</a>

    <div class="container" style="max-width: 800px; margin: 0 0 20px 0;">
        <h1>Responsáveis Cadastrados</h1>

        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alert-success">
                Responsável salvo com sucesso!
            </div>
        <?php endif; ?>

        <div class="submenu" style="margin-bottom: 25px;">
            <a href="ResponsavelCadastro.php" class="btn-link">➕ Cadastrar Novo Responsável</a>
            <a href="TarefaLista.php" class="btn-link btn-secondary" style="margin-left: 10px;">📋 Ver Tarefas</a>
        </div>

        <table class="table-data">
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 50%;">Nome</th>
                    <th style="width: 40%;">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($responsaveis)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center; color: #7f8c8d; padding: 20px;">
                            Nenhum responsável cadastrado.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($responsaveis as $resp): ?>
                        <tr>
                            <td><strong><?php echo $resp->getId(); ?></strong></td>
                            <td><?php echo $resp->getNome(); ?></td>
                            <td><?php echo $resp->getEmail(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>