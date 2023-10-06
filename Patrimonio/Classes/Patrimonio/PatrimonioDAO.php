<?php

require_once 'PatrimonioDTO.php'; 
require_once __DIR__ . '/../Database/ConexaoBD.php';  


class PatrimonioDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(PatrimonioDTO $Patrimonio) {
        $sql = "INSERT INTO tbPatrimonio (Nome, Apelido, Contacto,Email, UsrLogin, Estado, Senha) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Patrimonio->getNome(), $Patrimonio->getApelido(), $Patrimonio->getContacto(), $Patrimonio->getEmail(),$Patrimonio->getUsrLogin(), $Patrimonio->getEstado(), $Patrimonio->getSenha()]);
    }

    public function atualizar(PatrimonioDTO $Patrimonio) {
        $sql = "UPDATE tbPatrimonio SET Nome = ?, Apelido = ?, Contacto = ?,Email=?, UsrLogin = ? Estado = ?, WHERE Id_Patrimonio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Patrimonio->getNome(), $Patrimonio->getApelido(), $Patrimonio->getContacto(),$Patrimonio->getEmail(), $Patrimonio->getUsrLogin(), $Patrimonio->getEstado(), $Patrimonio->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbPatrimonio WHERE Id_Patrimonio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbPatrimonio WHERE Id_Patrimonio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbPatrimonio";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
