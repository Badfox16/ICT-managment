<?php

require_once 'AntenasPaDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class AntenasPaDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(AntenasPaDTO $AntenasPA)
    {
        $sql = "INSERT INTO tbAntenasPA (DescricaoAntenasPA, Marca, Modelo, NrDeSerie, Estado, Localizacao, MAC, Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $AntenasPA->getDescricao(),
            $AntenasPA->getMarca(),
            $AntenasPA->getModelo(),
            $AntenasPA->getNrDeSerie(),
            $AntenasPA->getEstado(),
            $AntenasPA->getLocalizacao(),
            $AntenasPA->getMac(),
            $AntenasPA->getObservacoes()
        ]);
    }

    public function atualizar(AntenasPaDTO $AntenasPA)
    {
        $sql = "UPDATE tbAntenasPA SET DescricaoAntenasPA = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, MAC = ?, Observacoes = ? WHERE Id_AntenasPA = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $AntenasPA->getDescricao(),
            $AntenasPA->getMarca(),
            $AntenasPA->getModelo(),
            $AntenasPA->getNrDeSerie(),
            $AntenasPA->getEstado(),
            $AntenasPA->getLocalizacao(),
            $AntenasPA->getMac(),
            $AntenasPA->getObservacoes(),
            $AntenasPA->getId()
        ]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbAntenasPA WHERE Id_AntenasPA = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbAntenasPA WHERE Id_AntenasPA = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbAntenasPA";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
