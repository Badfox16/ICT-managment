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
    Senha VARCHAR (20)
);

CREATE TABLE tbICT(
    Id_ICT INT AUTO_INCREMENT PRIMARY KEY,
    UsrLogin VARCHAR (20),
    Email VARCHAR (120),
    Estado VARCHAR (20),
    Senha VARCHAR (20)
);

INSERT INTO tbICT(UsrLogin, Email, Estado, Senha)
VALUES("admin","admin","Ativo","admin");

CREATE TABLE tbEdificio (
    Id_Edificio INT AUTO_INCREMENT PRIMARY KEY,
    NomeEdificio VARCHAR(20)
);

-- INSERT INTO tbEdificio (NomeEdificio)
-- VALUES("Novo Edificio"),
-- ("Antigo Edificio");

CREATE TABLE tbSala (
    Id_Sala INT AUTO_INCREMENT PRIMARY KEY,
    NomeSala VARCHAR(20),
    Id_Edificio INT,
    FOREIGN KEY (Id_Edificio) REFERENCES tbEdificio(Id_Edificio)
);

-- SELECT tbSala.DescricaoSala
-- FROM tbSala
-- INNER JOIN tbEdificio ON tbSala.Id_Edificio = tbEdificio.Id_Edificio
-- WHERE tbEdificio.NomeEdificio = 'Nome do tal edificio';

CREATE TABLE tbComputador (
    Id_Computador INT AUTO_INCREMENT PRIMARY KEY,
    DescricaoComputador VARCHAR(50),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NrDeSerie VARCHAR(50),
    Estado VARCHAR(50),
    Localizacao VARCHAR(50),
    Usuario VARCHAR(50),
    MAC VARCHAR(50),
    RAM INT (4),
    ROM INT (6),
    Observacoes TEXT
);

CREATE TABLE tbImpressora (
    Id_Impressora INT AUTO_INCREMENT PRIMARY KEY,
    DescricaoImpressora VARCHAR(50),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NrDeSerie VARCHAR(50),
    Estado VARCHAR(50),
    Localizacao VARCHAR(50),
    MAC VARCHAR(50),
    Observacoes TEXT
);

CREATE TABLE tbSwitch (
    Id_Switch INT AUTO_INCREMENT PRIMARY KEY,
    DescricaoSwitch VARCHAR(50),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NrDeSerie VARCHAR(50),
    Estado VARCHAR(50),
    Localizacao VARCHAR(50),
    MAC VARCHAR(50),
    Observacoes TEXT
);

CREATE TABLE tbAntenasPA (
    Id_AntenasPA INT AUTO_INCREMENT PRIMARY KEY,
    DescricaoAntena VARCHAR(50),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NrDeSerie VARCHAR(50),
    Estado VARCHAR(50),
    Localizacao VARCHAR(50),
    MAC VARCHAR(50),
    Observacoes TEXT
);

CREATE TABLE tbProjetor (
    Id_Projetor INT AUTO_INCREMENT PRIMARY KEY,
    DescricaoProjetor VARCHAR(50),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NrDeSerie VARCHAR(50),
    Estado VARCHAR(50),
    Localizacao VARCHAR(50),
    Observacoes TEXT
);

CREATE TABLE tbHardware (
    Id_Hardware INT AUTO_INCREMENT PRIMARY KEY,
    Id_Computador INT,
    Id_Impressora INT,
    Id_Switch INT,
    Id_AntenasPA INT,
    Id_Projetor INT,
    FOREIGN KEY (Id_Computador) REFERENCES tbComputador(Id_Computador),
    FOREIGN KEY (Id_Impressora) REFERENCES tbImpressora(Id_Impressora),
    FOREIGN KEY (Id_Switch) REFERENCES tbSwitch(Id_Switch),
    FOREIGN KEY (Id_AntenasPA) REFERENCES tbAntenasPA(Id_AntenasPA),
    FOREIGN KEY (Id_Projetor) REFERENCES tbProjetor(Id_Projetor)
);

CREATE TABLE tbSoftware (
    Id_Software INT AUTO_INCREMENT PRIMARY KEY,
    Id_Computador INT,
    NomeSoftware VARCHAR (255),
    Fabricante VARCHAR(255),
    Versao VARCHAR(255),
    Estado VARCHAR(255),
    Observacoes TEXT,
    Categoria VARCHAR(50),
    DiaInstalacao DATE DEFAULT CURRENT_DATE,
    PrazoSoftware INT,
    DiaExpiracao DATE,
    FOREIGN KEY(Id_Computador) REFERENCES tbComputador(Id_Computador)
);

CREATE TABLE tbManutencao (
    Id_Manutencao INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255),
    Descricao TEXT,
    Id_Computador INT,
    Id_Impressora INT,
    Id_Switch INT,
    Id_AntenasPA INT,
    Id_Projetor INT,
    FOREIGN KEY (Id_Computador) REFERENCES tbComputador(Id_Computador),
    FOREIGN KEY (Id_Impressora) REFERENCES tbImpressora(Id_Impressora),
    FOREIGN KEY (Id_Switch) REFERENCES tbSwitch(Id_Switch),
    FOREIGN KEY (Id_AntenasPA) REFERENCES tbAntenasPA(Id_AntenasPA),
    FOREIGN KEY (Id_Projetor) REFERENCES tbProjetor(Id_Projetor)
);

CREATE TABLE tbLogs (
    Id_logs INT AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(255) NOT NULL,
    Atividade VARCHAR(255) NOT NULL,
    Hora VARCHAR(255)
);
