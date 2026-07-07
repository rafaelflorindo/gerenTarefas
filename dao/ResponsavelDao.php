<?php

namespace Dao;

use Model\Responsavel;
use PDO;

class ResponsavelDao 
{
    private PDO $db;

    public function __construct() 
    {
        $this->db = Conexao::getConexao();
    }

    public function inserir(Responsavel $responsavel): bool 
    {
        $sql = "INSERT INTO responsaveis (nome, email) VALUES (:nome, :email)";
        $stmt = $this->db->prepare($sql);
        
        // Passando os valores diretamente em um array associativo
        return $stmt->execute([
            ':nome'  => $responsavel->getNome(),
            ':email' => $responsavel->getEmail()
        ]);
    }

    public function listarTodos(): array 
    {
        $sql = "SELECT * FROM responsaveis ORDER BY nome";
        $stmt = $this->db->query($sql);
        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lista = [];

        foreach ($resultados as $row) {
            $lista[] = new Responsavel($row['id'], $row['nome'], $row['email']);
        }

        return $lista;
    }
}