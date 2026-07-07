<?php

namespace Model;

class Tarefa 
{
    private ?int $id;
    private string $descricao;
    private ?Responsavel $responsavel; // Relacionamento OO

    public function __construct(?int $id = null, string $descricao = "", ?Responsavel $responsavel = null) 
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->responsavel = $responsavel;
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

    public function getDescricao(): string 
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void 
    {
        $this->descricao = $descricao;
    }

    public function getResponsavel(): ?Responsavel 
    {
        return $this->responsavel;
    }

    public function setResponsavel(?Responsavel $responsavel): void 
    {
        $this->responsavel = $responsavel;
    }
}