<?php
require_once 'SoftwareDTO.php';
require_once __DIR__ .'/../../../db/ConexaoDB.php';

class SoftwareDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(SoftwareDTO $software)
    {
        $sql = "INSERT INTO tbSoftware (Id_Equipamento, NomeSoftware, Fabricante, Versao, Estado, Observacoes, DiaInstalacao, PrazoSoftware, DiaExpiracao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$software->getIdEquipamento(), $software->getNomeSoftware(), $software->getFabricante(), $software->getVersao(), $software->getEstado(), $software->getObservacoes(), $software->getDiaInstalacao(), $software->getPrazoSoftware(), $software->getDiaExpiracao()]);
    }

    public function atualizar(SoftwareDTO $software)
    {
        $sql = "UPDATE tbSoftware SET Id_Equipamento = ?, NomeSoftware = ?, Fabricante = ?, Versao = ?, Estado = ?, Observacoes = ?, DiaInstalacao = ?, PrazoSoftware = ?, DiaExpiracao = ? WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$software->getIdEquipamento(), $software->getNomeSoftware(), $software->getFabricante(), $software->getVersao(), $software->getEstado(), $software->getObservacoes(), $software->getDiaInstalacao(), $software->getPrazoSoftware(), $software->getDiaExpiracao(), $software->getIdSoftware()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbSoftware WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbSoftware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $softwares = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $software = new SoftwareDTO($resultado['Id_Software'], $resultado['Id_Equipamento'], $resultado['NomeSoftware'], $resultado['Fabricante'], $resultado['Versao'], $resultado['Estado'], $resultado['Observacoes'], $resultado['DiaInstalacao'], $resultado['PrazoSoftware'], $resultado['DiaExpiracao']);
            $softwares[] = $software;
        }

        return $softwares;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbSoftware WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new SoftwareDTO($resultado['Id_Software'], $resultado['Id_Equipamento'], $resultado['NomeSoftware'], $resultado['Fabricante'], $resultado['Versao'], $resultado['Estado'], $resultado['Observacoes'], $resultado['DiaInstalacao'], $resultado['PrazoSoftware'], $resultado['DiaExpiracao']);
        } else {
            return null;
        }
    }
}
