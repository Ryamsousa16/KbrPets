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

-- Criando a tabela solicitacao_adocao
CREATE TABLE solicitacao_adocao(
    nome_dono VARCHAR(160),
    nome_animal VARCHAR(160),
    cpf CHAR(11),
    email_dono VARCHAR(160),
    telefone VARCHAR(20),
    data_nascimento DATE);
    
-- Mostrando informações da tabela solicitacao_adocao
SELECT * FROM solicitacao_adocao;
