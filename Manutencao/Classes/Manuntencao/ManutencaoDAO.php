<?php

require_once 'ManutencaoDTO.php';
require_once __DIR__ . '/../Database/ConexaoBD.php';


class ManutencaoDAO
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserirComputador(ManutencaoDTO $Manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_Computador) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdComputador()]);
    }

    public function inserirImpressora(ManutencaoDTO $Manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_Impressora) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdImpressora()]);
    }

    public function inserirSwitch(ManutencaoDTO $Manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_Switch) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdSwitch()]);
    }

    public function inserirAntenasPA(ManutencaoDTO $Manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_AntenasPA) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdAntenasPA()]);
    }

    public function inserirProjetor(ManutencaoDTO $Manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_Projetor) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdProjetor()]);
    }

    public function atualizar(ManutencaoDTO $Manutencao)
    {
        $sql = "UPDATE tbManutencao SET Titulo = ?, Descricao = ? WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getTitulo(), $Manutencao->getDescricao(), $Manutencao->getIdManutencao()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbManutencao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
