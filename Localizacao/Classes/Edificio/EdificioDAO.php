<?php

require_once 'EdificioDTO.php';
require_once '../../../db/ConexaoDB.php';


class EdificioDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(EdificioDTO $Edificio) {
        $sql = "INSERT INTO tbEdificio (NomeEdificio) VALUES (?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Edificio->getNomeEdificio()]);
    }

    public function atualizar(EdificioDTO $Edificio) {
        $sql = "UPDATE tbEdificio SET NomeEdificio = ? WHERE Id_Edificio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Edificio->getNomeEdificio(), $Edificio->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbEdificio WHERE Id_Edificio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbEdificio WHERE Id_Edificio = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tbEdificio";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
