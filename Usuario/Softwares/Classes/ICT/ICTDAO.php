<?php

require_once 'ICTDTO.php';
require_once __DIR__ .'/../../../../db/ConexaoDB.php';


class ICTDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(ICTDTO $ICT) {
        $sql = "INSERT INTO tbICT (UsrLogin, Email, Estado, Senha) VALUES (?, ?, ?, SHA2(?, 256))";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$ICT->getUsrLogin(), $ICT->getEmail(), $ICT->getEstado(), $ICT->getSenha()]);
    }

    public function atualizar(ICTDTO $ICT) {
        $sql = "UPDATE tbICT SET UsrLogin = ?, Email=?, Estado=?, Senha = SHA2(?, 256) WHERE Id_ICT = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$ICT->getUsrLogin(), $ICT->getEmail(), $ICT->getEstado(), $ICT->getSenha(), $ICT->getId()]);
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

    public function listarPorEstado($estado) {
        $sql = "SELECT * FROM tbICT WHERE Estado = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$estado]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($email, $senha) {
        $sql = "SELECT * FROM tbICT WHERE Usrlogin = ? AND Senha = SHA2(?, 256)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$email, $senha]);
        $ICT = $stmt->fetch(PDO::FETCH_ASSOC);

        return $ICT ? $ICT : null;
    }
}
