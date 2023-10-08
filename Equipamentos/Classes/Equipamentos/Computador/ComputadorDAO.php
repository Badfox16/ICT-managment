<?php

require_once 'ComputadorDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class ComputadorDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(ComputadorDTO $Computador)
    {
        $sql = "INSERT INTO tbComputador (DescricaoComputador, Marca, Modelo, NrDeSerie, Estado, Localizacao, MAC, Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Computador->getDescricao(), $Computador->getMarca(), $Computador->getModelo(), $Computador->getNrDeSerie(), $Computador->getEstado(), $Computador->getLocalizacao(), $Computador->getMac(), $Computador->getObservacoes()]);
    }

    public function atualizar(ComputadorDTO $Computador)
    {
        $sql = "UPDATE tbComputador SET DescricaoComputador = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, MAC = ?, Observacoes = ? WHERE Id_Computador = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Computador->getDescricao(), $Computador->getMarca(), $Computador->getModelo(), $Computador->getNrDeSerie(), $Computador->getEstado(), $Computador->getLocalizacao(), $Computador->getMac(), $Computador->getObservacoes(), $Computador->getId()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbComputador WHERE Id_Computador = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbComputador WHERE Id_Computador = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbComputador";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
