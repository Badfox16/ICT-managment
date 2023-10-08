<?php

require_once 'SoftwareDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class ComputadorDAO
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(SoftwareDTO $Software)
    {
        $sql = "INSERT INTO tbSoftware (Id_Software, NomeSoftware, Fabricante, Versao, Estado, Observacoes, Categoria, DiaInstalacao, PrazoSoftware, DiaExpiracao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $Software->getIdSoftware(),
            $Software->getNomeSoftware(),
            $Software->getFabricante(),
            $Software->getVersao(),
            $Software->getEstado(),
            $Software->getObservacoes(),
            $Software->getCategoria(),
            $Software->getDiaInstalacao(),
            $Software->getPrazoSoftware(),
            $Software->getDiaExpiracao()
        ]);
    }

    public function atualizar(SoftwareDTO $Software)
    {
        $sql = "UPDATE tbSoftware SET NomeSoftware=?, Fabricante=?, Versao=?, Estado=?, Observacoes=?, Categoria=?, DiaInstalacao=?, PrazoSoftware=?, DiaExpiracao=? WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $Software->getNomeSoftware(),
            $Software->getFabricante(),
            $Software->getVersao(),
            $Software->getEstado(),
            $Software->getObservacoes(),
            $Software->getCategoria(),
            $Software->getDiaInstalacao(),
            $Software->getPrazoSoftware(),
            $Software->getDiaExpiracao(),
            $Software->getIdSoftware()
        ]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbSoftware WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbSoftware WHERE Id_Software = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbSoftware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
