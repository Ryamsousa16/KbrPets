-- Criação da base de dados e a usando
CREATE DATABASE KbrTec;
use KbrTec;

-- Criação da tabela usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(160),
    email VARCHAR(160),
    senha VARCHAR(160),
    ativo VARCHAR(160) default 'Inativo'
);

-- Inserindo dados na tabela usuarios
INSERT INTO usuarios (nome, email, senha) VALUES ('Admin', 'admin@kbrtec.com.br', '8080');
INSERT INTO usuarios (nome, email, senha) VALUES ('Usuário', 'usuario@kbrtec.com.br', '3360');
INSERT INTO usuarios (nome, email, senha) VALUES ('Teste', 'teste@kbrtec.com.br', '0800');
INSERT INTO usuarios (nome, email, senha) VALUES ('Ryam', 'ryam@email.com.br', '1234');

-- Mostrando informações da tabela usuários
SELECT * FROM usuarios;
