<?php

require_once 'GerenteDTO.php'; 
require_once __DIR__ . '/../Database/ConexaoBD.php';  


class GerenteDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(GerenteDTO $gerente) {
        $sql = "INSERT INTO tbGerente (Nome, Apelido, Contacto, UsrLogin, Senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$gerente->getNome(), $gerente->getApelido(), $gerente->getContacto(), $gerente->getUsrLogin(), $gerente->getSenha()]);
    }

    public function atualizar(GerenteDTO $gerente) {
        $sql = "UPDATE tbGerente SET Nome = ?, Apelido = ?, Contacto = ?, UsrLogin = ? WHERE Id_Gerente = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$gerente->getNome(), $gerente->getApelido(), $gerente->getContacto(), $gerente->getUsrLogin(), $gerente->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbGerente WHERE Id_Gerente = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbGerente WHERE Id_Gerente = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbGerente";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
