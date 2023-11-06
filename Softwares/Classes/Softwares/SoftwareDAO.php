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
        $sql = "INSERT INTO tbSoftware (Id_Equipamento, NomeSoftware, Fabricante, Versao, Estado, Observacoes, DiaInstalacao, DiaExpiracao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $software->getIdEquipamento(),
            $software->getNomeSoftware(),
            $software->getFabricante(),
            $software->getVersao(),
            $software->getEstado(),
            $software->getObservacoes(),
            $software->getDiaInstalacao(),
            $software->getDiaExpiracao()
        ]);
    }

    public function atualizar(SoftwareDTO $software)
    {
        $sql = "UPDATE tbSoftware SET 
                Id_Equipamento = ?,
                NomeSoftware = ?,
                Fabricante = ?,
                Versao = ?,
                Estado = ?,
                Observacoes = ?,
                DiaInstalacao = ?,
                DiaExpiracao = ?
                WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $software->getIdEquipamento(),
            $software->getNomeSoftware(),
            $software->getFabricante(),
            $software->getVersao(),
            $software->getEstado(),
            $software->getObservacoes(),
            $software->getDiaInstalacao(),
            $software->getDiaExpiracao(),
            $software->getIdSoftware()
        ]);
    }

    public function remover($idSoftware)
    {
        $sql = "DELETE FROM tbSoftware WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$idSoftware]);
    }

    public function buscarPorId($idSoftware)
    {
        $sql = "SELECT s.*, e.Marca AS MarcaComputador ,e.Modelo AS ModeloComputador,e.NrDeSerie AS NrComputador
                FROM tbSoftware s
                LEFT JOIN tbEquipamento e ON s.Id_Equipamento = e.Id_Equipamento
                WHERE s.Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$idSoftware]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function listarTodos()
    {
        $sql = "SELECT * FROM tbSoftware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $softwares = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Criando um novo objeto SoftwareDTO com os atributos básicos
            $software = new SoftwareDTO();
            $software->setIdSoftware($resultado['Id_Software']);
            $software->setIdEquipamento($resultado['Id_Equipamento']);
            $software->setNomeSoftware($resultado['NomeSoftware']);
            $software->setFabricante($resultado['Fabricante']);
            $software->setVersao($resultado['Versao']);
            $software->setEstado($resultado['Estado']);
            $software->setObservacoes($resultado['Observacoes']);
            $software->setDiaInstalacao($resultado['DiaInstalacao']);
    
            $software->setDiaExpiracao($resultado['DiaExpiracao']);

            // Adicionando o objeto ao array
            $softwares[] = $software;
        }

        return $softwares;
    }


}
