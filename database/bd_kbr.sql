-- Criação da base de dados e a usando

CREATE DATABASE KbrTec;
USE KbrTec;

-- Criação da tabela usuarios
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_criacao TIMESTAMP,
    nome VARCHAR(160),
    email VARCHAR(160),
    senha VARCHAR(160),
    ativo VARCHAR(160) default 'Desativado'
);

-- Inserindo dados na tabela usuarios
INSERT INTO usuarios (nome, email, senha) VALUES ('Admin', 'admin@kbrtec.com.br', '8080');
INSERT INTO usuarios (nome, email, senha) VALUES ('Usuário', 'usuario@kbrtec.com.br', '3360');
INSERT INTO usuarios (nome, email, senha) VALUES ('Teste', 'teste@kbrtec.com.br', '0800');
INSERT INTO usuarios (nome, email, senha) VALUES ('Ryam', 'ryam@email.com.br', '1234');

-- Criando a tabela dos animais
CREATE TABLE animais_adocao(
	codigo_animal INT, 
    data_criacao_animal TIMESTAMP,
    nome_animal VARCHAR(255),
    especie VARCHAR(100),
    raca VARCHAR(100),
    descricao TEXT,
    sexo CHAR(1),
    idade VARCHAR(20),
    peso VARCHAR(10),
    porte VARCHAR(50),
    localidade VARCHAR(255),
    ativo VARCHAR(160) default 'Ativo'
);

-- Inserindo dados na tabela animais_adocao
INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(873012, 'Tini', 'Gato',
                           'American Shorthair', '💖 Frajolinha Fêmea de narizinho rosa.', 
                           'F', '3 anos', '5kg', 'Médio', 'Petz Bom Retiro, Curitiba - PR');
                           
INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(675092, 'Bili', 'Cachorro',
                           'Yorkshire terrier', 'Ele é o parceiro perfeito, muito leal e protetor!', 
                           'M', '5 meses', '1.2kg', 'Pequeno', 'Petz Casa Grande, Diadema - SP');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(309123, 'Luna', 'Cachorro',
                           'Schnauzer', 'Com energia para queimar, este cachorro adora atividades ao ar livre e brincadeiras intermináveis.', 
                           'F', '5 Anos', '3.5kg', 'Pequeno', 'Petz Vila Gomes, São Paulo - SP');
                           
INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(129381, 'Bird', 'Gato',
                           'Norueguês da Floresta', 'Um aventureiro por natureza, este gato adora explorar novos lugares.', 
                           'M', '1 Ano', '2.7kg', 'Grande', 'Petz Centro, Teresina - PI');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(312351, 'Suzy', 'Gato',
                           'Gato Doméstico de Pêlo Curto', 'Uma verdadeira bola de pelo sociável, ele adora fazer amizades, seja humano ou outros animais.', 
                           'F', '8 Meses', '1.9kg', 'Médio', 'Petz Parque Imperial, São Paulo - SP');
                           
INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(231042, 'Teco', 'Gato',
                           'Sem Raça Definida', 'Sempre em busca de diversão, é um entusiasta de brincadeiras e jogos.', 
                           'M', '4 Meses', '2.3kg', 'Médio', 'Petz Centro, Teresina - PI');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(232093, 'Bruce', 'Cachorro',
                           'Buldogue Francês', 'Adora aconchegar-se no colo de seus donos para momentos de carinho e afeto.', 
                           'M', '3 Meses', '1.6kg', 'Pequeno', 'Petz Buritis, Belo Horizonte - MG');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(231032, 'Maya', 'Cachorro',
                           'Yorkshire terrier', 'Um cachorro calmo que traz uma sensação de tranquilidade para qualquer ambiente.', 
                           'F', '9 Meses', '1.9kg', 'Pequeno', 'Petz Vila Joana, Jundiaí - SP');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(412398, 'Bela', 'Cachorro',
                           'Golden Retriever', 'Um companheiro brincalhão, ideal para famílias ativas que amam se exercitar com seus pets.', 
                           'F', '1 Ano e 4 Meses', '3.1kg', 'Grande', 'Petz Guará I, Brasília - DF');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(230131, 'Gaia', 'Gato',
                           'Gato malhado', 'Ela é extremamente carinhosa e adora ser mimada. Adoça qualquer lar com seu ronronar suave.', 
                           'F', '1 Ano e 2 Meses', '2.2kg', 'Médio', 'Petz Igrejinha, Capanema - PA');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(005612, 'Koda', 'Coelho',
                           'Coelho Leão', 'Apesar de sua natureza tímida, ele é curioso e aprecia interações tranquilas.', 
                           'M', '5 Meses', '1.5kg', 'Pequeno', 'Petz Centro, Teresina - PI');

INSERT INTO animais_adocao(codigo_animal, nome_animal, especie, raca, descricao, sexo,
						   idade, peso, porte, localidade) VALUES(093132, 'Luke', 'Cachorro',
                           'Golden retriever', 'Um verdadeiro aventureiro, ele adora explorar e está sempre pronto para uma nova jornada.', 
                           'M', '1 Ano e 1 Mês', '6.2kg', 'Grande', 'Petz Warta, Londrina - PR');

-- Criando a tabela solicitacao_adocao
CREATE TABLE solicitacao_adocao(
    nome_dono VARCHAR(160) NOT NULL,
    nome_animal VARCHAR(160) NOT NULL,
    cpf CHAR(11) NOT NULL,
    email_dono VARCHAR(160) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    data_solicitacao TIMESTAMP,
    data_nascimento DATE NOT NULL);
-- Mostrando informações da tabela solicitacao_adocao

SELECT * FROM solicitacao_adocao;

-- Criando a tabela das imagens para os animais
CREATE TABLE imagens(
    nome_arquivo VARCHAR(255) NOT NULL,
    animal_id INT,
    data_upload TIMESTAMP
);

-- Inserindo dados na tabela imagens
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('bili.webp', 675092);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Luna.webp', 309123);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Bird.webp', 129381);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Suzy.webp', 312351);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Teco.webp', 231042);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Bruce.webp', 232093);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Maya.webp', 231032);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('bela.webp', 412398);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Gaia.webp', 230131);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Koda.webp', 005612);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Luke.webp', 93132);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Tini.webp', 873012);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Tini-2.webp', 873012);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Tini-3.webp', 873012);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Tini-4.webp', 873012);
INSERT INTO imagens(nome_arquivo, animal_id) VALUES('Tini-5.webp', 873012);

