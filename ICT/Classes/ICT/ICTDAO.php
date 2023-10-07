<?php

require_once 'ICTDTO.php'; 
require_once __DIR__ . '/../Database/ConexaoBD.php';  


class ICTDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(ICTDTO $ICT) {
        $sql = "INSERT INTO tbICT (UsrLogin, Senha) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$ICT->getUsrLogin(), $ICT->getSenha()]);
    }

    public function atualizar(ICTDTO $ICT) {
        $sql = "UPDATE tbICT SET UsrLogin = ?, Senha = ? WHERE Id_ICT = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$ICT->getUsrLogin(), $ICT->getSenha(), $ICT->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbICT WHERE Id_ICT = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbICT WHERE Id_ICT = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbICT";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
