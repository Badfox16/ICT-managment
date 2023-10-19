CREATE DATABASE `bdICT` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_esperanto_ci;

USE bdICT;

CREATE TABLE tbPatrimonio (
    Id_Patrimonio INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR (50),
    Apelido VARCHAR (50),
    Contacto VARCHAR (13),
    Email VARCHAR(120),
    UsrLogin VARCHAR (20),
    Estado VARCHAR (20),
    Senha VARCHAR (255)
);

CREATE TABLE tbICT(
    Id_ICT INT AUTO_INCREMENT PRIMARY KEY,
    UsrLogin VARCHAR (120),
    Email VARCHAR (255),
    Estado VARCHAR (20),
    Senha VARCHAR (255)
);

INSERT INTO tbICT(UsrLogin, Email, Estado, Senha)
VALUES('admin', 'admin', 'Ativo', 'admin');
CREATE TABLE tbEdificio (
    Id_Edificio INT AUTO_INCREMENT PRIMARY KEY,
    NomeEdificio VARCHAR(120)
);

INSERT INTO tbEdificio (NomeEdificio)
VALUES("Novo Edificio"),
("Antigo Edificio");

CREATE TABLE tbSala (
    Id_Sala INT AUTO_INCREMENT PRIMARY KEY,
    NomeSala VARCHAR(120),
    Id_Edificio INT,
    FOREIGN KEY (Id_Edificio) REFERENCES tbEdificio(Id_Edificio)
);


CREATE TABLE tbTipo(
    Id_Tipo INT AUTO_INCREMENT PRIMARY KEY,
    Tipo VARCHAR(255)
);

INSERT INTO tbTipo(Tipo)
VALUES('Computador'), ('Impressora'), ('Projetor'), ('Switch'),
('Roteador'), ('Cameras');

CREATE TABLE tbEquipamento(
    Id_Equipamento INT AUTO_INCREMENT PRIMARY KEY,
    Tipo INT NOT NULL,
    Marca VARCHAR(150),
    Modelo VARCHAR(150),
    NrDeSerie VARCHAR(150),
    Estado VARCHAR(150),
    Localizacao INT,
    Fornecedor VARCHAR(150),
    DataFornecimento VARCHAR(50),
    DescricaoEquipamento TEXT,
    Observacoes TEXT,
    FOREIGN KEY(Tipo) REFERENCES tbTipo(Id_Tipo),
    FOREIGN KEY(Localizacao) REFERENCES tbSala(Id_Sala)
);

CREATE TABLE tbSoftware (
    Id_Software INT AUTO_INCREMENT PRIMARY KEY,
    Id_Equipamento INT,
    NomeSoftware VARCHAR (255),
    Fabricante VARCHAR(255),
    Versao VARCHAR(255),
    Estado VARCHAR(255),
    Observacoes TEXT,
    DiaInstalacao VARCHAR(50),
    PrazoSoftware INT,
    DiaExpiracao DATE,
    FOREIGN KEY(Id_Equipamento) REFERENCES tbEquipamento(Id_Equipamento)
);

CREATE TABLE tbManutencao (
    Id_Manutencao INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255),
    Descricao TEXT,
    Id_Equipamento INT,
    FOREIGN KEY (Id_Equipamento) REFERENCES tbEquipamento(Id_Equipamento)
);

CREATE TABLE tbLogs (
    Id_logs INT AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(255) NOT NULL,
    Atividade VARCHAR(255) NOT NULL,
    Hora VARCHAR(255)
);