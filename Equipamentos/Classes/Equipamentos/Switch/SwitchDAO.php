<?php

require_once 'SwitchDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';


class PatrimonioDAO
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(SwitchDTO $SwitchObject)
    {
        $sql = "INSERT INTO tbSwitch (DescricaoSwitch, Marca, Modelo, NrDeSerie, Estado, Localizacao, MAC, Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?,)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$SwitchObject->getDescricao(), $SwitchObject->getMarca(), $SwitchObject->getModelo(), $SwitchObject->getNrDeSerie(), $SwitchObject->getEstado(), $SwitchObject->getLocalizacao(), $SwitchObject->getMac(), $SwitchObject->getObservacoes()]);
    }

    public function atualizar(SwitchDTO $SwitchObject)
    {
        $sql = "UPDATE tbSwitch SET DescricaoSwitch = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, MAC = ?, Obersavacoes = ?, WHERE Id_Switch = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$SwitchObject->getDescricao(), $SwitchObject->getMarca(), $SwitchObject->getModelo(), $SwitchObject->getNrDeSerie(), $SwitchObject->getEstado(), $SwitchObject->getLocalizacao(), $SwitchObject->getMac(), $SwitchObject->getObservacoes(),$SwitchObject->getId()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbSwitch WHERE Id_Switch = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbSwitch WHERE Id_Switch = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbSwitch";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
