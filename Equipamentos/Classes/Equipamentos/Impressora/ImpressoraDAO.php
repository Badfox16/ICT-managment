<?php

require_once 'ImpressoraDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class ImpressoraDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(ImpressoraDTO $Impressora)
    {
        $sql = "INSERT INTO tbImpressora (DescricaoImpressora, Marca, Modelo, NrDeSerie, Estado, Localizacao, MAC,Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Impressora->getDescricao(), $Impressora->getMarca(), $Impressora->getModelo(), $Impressora->getNrDeSerie(), $Impressora->getEstado(), $Impressora->getLocalizacao(),  $Impressora->getMac(), $Impressora->getObservacoes()]);
    }

    public function atualizar(ImpressoraDTO $Impressora)
    {
        $sql = "UPDATE tbImpressora SET DescricaoImpressora = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, MAC = ?,  Obersavacoes = ? WHERE Id_Impressora = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Impressora->getDescricao(), $Impressora->getMarca(), $Impressora->getModelo(), $Impressora->getNrDeSerie(), $Impressora->getEstado(), $Impressora->getLocalizacao(), $Impressora->getMac(), $Impressora->getObservacoes(), $Impressora->getId()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbImpressora WHERE Id_Impressora = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbImpressora WHERE Id_Impressora = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbImpressora";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
