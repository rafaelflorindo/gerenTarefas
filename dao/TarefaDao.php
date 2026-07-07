<?php

namespace Dao;

use Model\Tarefa;
use Model\Responsavel;
use PDO;

class TarefaDao 
{
    private PDO $db;

    public function __construct() 
    {
        $this->db = Conexao::getConexao();
    }

    public function inserir(Tarefa $tarefa): bool 
    {
        $sql = "INSERT INTO tarefas (descricao, responsavel_id) VALUES (:descricao, :responsavel_id)";
        $stmt = $this->db->prepare($sql);
        
        // Pega o ID do responsável se ele existir, senão define como null
        $idResponsavel = $tarefa->getResponsavel() ? $tarefa->getResponsavel()->getId() : null;
        
        // Executa passando todos os parâmetros mapeados no array
        return $stmt->execute([
            ':descricao'      => $tarefa->getDescricao(),
            ':responsavel_id' => $idResponsavel
        ]);
    }

    public function listarTodas(): array 
    {
        $sql = "SELECT t.id AS tarefa_id, t.descricao, r.id AS resp_id, r.nome, r.email 
                FROM tarefas t 
                LEFT JOIN responsaveis r ON t.responsavel_id = r.id 
                ORDER BY t.id DESC";
                
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lista = [];

        foreach ($resultados as $row) {
            $responsavel = null;
            
            if ($row['resp_id'] !== null) {
                $responsavel = new Responsavel($row['resp_id'], $row['nome'], $row['email']);
            }

            $lista[] = new Tarefa($row['tarefa_id'], $row['descricao'], $responsavel);
        }

        return $lista;
    }
}