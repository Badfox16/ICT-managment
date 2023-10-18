<?php

require_once 'ManutencaoDTO.php'; 
require_once __DIR__ . '/../Database/ConexaoBD.php';  


class ManutencaoDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(ManutencaoDTO $Manutencao) {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getDescricao(), $Manutencao->getTitulo(), $Manutencao->getId_equipamento()]);
    }

    public function atualizar(ManutencaoDTO $Manutencao) {
        $sql = "UPDATE tbManutencao SET  Titulo = ?, Descricao = ? WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Manutencao->getDescricao(), $Manutencao->getTitulo(), $Manutencao->getId_manutencao()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbManutencao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
