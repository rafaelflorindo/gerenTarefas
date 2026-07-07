<?php

namespace Controller;

use Model\Responsavel;
use Dao\ResponsavelDao;

class ResponsavelController 
{
    private ResponsavelDao $responsavelDao;

    public function __construct() 
    {
        $this->responsavelDao = new ResponsavelDao();
    }

    // Processa o formulário de cadastro enviado via POST
    public function cadastrar(): void 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';

            // Validação simples
            if (!empty($nome) && !empty($email)) {
                $responsavel = new Responsavel(null, $nome, $email);
                
                if ($this->responsavelDao->inserir($responsavel)) {
                    // Redireciona de volta para a listagem após salvar
                    header("Location: ResponsavelLista.php?sucesso=1");
                    exit;
                }
            }
            // Se falhar, volta com erro
            header("Location: ResponsavelCadastro.php?erro=1");
            exit;
        }
    }

    // Retorna a lista completa para ser usada na View
    public function listar(): array 
    {
        return $this->responsavelDao->listarTodos();
    }
}