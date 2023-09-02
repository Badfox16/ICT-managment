<?php

require_once 'AdminDTO.php'; 
require_once __DIR__ . '/../Database/ConexaoBD.php';  


class AdminDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(AdminDTO $Admin) {
        $sql = "INSERT INTO tbAdmin (UsrLogin, Senha) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Admin->getUsrLogin(), $Admin->getSenha()]);
    }

    public function atualizar(AdminDTO $Admin) {
        $sql = "UPDATE tbAdmin SET UsrLogin = ?, Senha = ? WHERE Id_Admin = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Admin->getUsrLogin(), $Admin->getSenha(), $Admin->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbAdmin WHERE Id_Admin = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbAdmin WHERE Id_Admin = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbAdmin";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
