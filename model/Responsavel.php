<?php

namespace Model;

class Responsavel 
{
    private ?int $id;
    private string $nome;
    private string $email;

    // Construtor com parâmetros opcionais para facilitar a instanciação
    public function __construct(?int $id = null, string $nome = "", string $email = "") 
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    // Getters e Setters
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function setId(?int $id): void 
    {
        $this->id = $id;
    }

    public function getNome(): string 
    {
        return $this->nome;
    }

    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }
}