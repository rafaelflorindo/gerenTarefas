CREATE DATABASE geren_tarefas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE geren_tarefas;

CREATE TABLE responsaveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    responsavel_id INT NULL,
    FOREIGN KEY (responsavel_id) REFERENCES responsaveis(id) ON DELETE SET NULL
);