<?php

namespace Dao;

use PDO;
use PDOException;

class Conexao 
{
    private static ?PDO $instancia = null;

    public static function getConexao(): PDO 
    {
        if (self::$instancia === null) {
            try {
                // Ajuste o nome do banco, usuário e senha conforme o seu ambiente local
                $dsn = "mysql:host=localhost;dbname=geren_tarefas;charset=utf8mb4";
                $usuario = "root";
                $senha = "Senac1234";

                self::$instancia = new PDO($dsn, $usuario, $senha);
                // Configura o PDO para estourar exceções em caso de erros de SQL
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}