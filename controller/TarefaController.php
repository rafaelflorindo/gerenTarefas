<?php

namespace Controller;

use Model\Tarefa;
use Model\Responsavel;
use Dao\TarefaDao;

class TarefaController 
{
    private TarefaDao $tarefaDao;

    public function __construct() 
    {
        $this->tarefaDao = new TarefaDao();
    }

    public function cadastrar(): void 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = $_POST['descricao'] ?? '';
            $idResponsavel = $_POST['responsavel_id'] ?? null;

            if (!empty($descricao)) {
                // Se um responsável foi selecionado, cria o objeto apenas com o ID para o DAO usar
                $responsavel = null;
                if (!empty($idResponsavel)) {
                    $responsavel = new Responsavel((int)$idResponsavel);
                }

                $tarefa = new Tarefa(null, $descricao, $responsavel);

                if ($this->tarefaDao->inserir($tarefa)) {
                    header("Location: TarefaLista.php?sucesso=1");
                    exit;
                }
            }
            header("Location: TarefaCadastro.php?erro=1");
            exit;
        }
    }

    public function listar(): array 
    {
        return $this->tarefaDao->listarTodas();
    }
}