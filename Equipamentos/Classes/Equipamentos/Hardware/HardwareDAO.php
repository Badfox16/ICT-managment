<?php

require_once 'HardwareDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class HardwareDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(HardwareDTO $Hardware)
    {
        $sql = "INSERT INTO tbHardware (Id_Computador, Id_Impressora, Id_Switch, Id_AntenasPA, Id_Projetor) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Hardware->getIdComputador(), $Hardware->getIdImpressora(), $Hardware->getIdSwitch(), $Hardware->getIdAntenasPA(), $Hardware->getIdProjetor()]);
    }

    public function atualizar(HardwareDTO $Hardware)
    {
        $sql = "UPDATE tbHardware SET Id_Computador = ?, Id_Impressora = ?, Id_Switch = ?, Id_AntenasPA = ?, Id_Projetor = ? WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Hardware->getIdComputador(), $Hardware->getIdImpressora(), $Hardware->getIdSwitch(), $Hardware->getIdAntenasPA(), $Hardware->getIdProjetor(), $Hardware->getIdHardware()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbHardware WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbHardware WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbHardware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
