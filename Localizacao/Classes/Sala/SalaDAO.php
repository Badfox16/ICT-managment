<?php

require_once 'SalaDTO.php';
require_once __DIR__ . '/../../../db/ConexaoDB.php';


class SalaDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(SalaDTO $Sala) {
        $sql = "INSERT INTO tbSala (NomeSala, Id_Edificio) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Sala->getNomeSala(), $Sala->getId_edificio()]);
    }

    public function atualizar(SalaDTO $Sala) {
        $sql = "UPDATE tbSala SET NomeSala = ?, Id_Edificio=? WHERE Id_Sala = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Sala->getNomeSala(), $Sala->getId_edificio(), $Sala->getId()]);
    }

    public function remover($id) {
        $sql = "DELETE FROM tbSala WHERE Id_Sala = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tbSala WHERE Id_Sala = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos() {
        $sql = "SELECT tbSala.Id_Sala, tbSala.NomeSala, tbEdificio.NomeEdificio
        FROM tbSala
        INNER JOIN tbEdificio ON tbSala.Id_Edificio = tbEdificio.Id_Edificio order by tbSala.Id_Sala;
        ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //metodos especiais
    public function listarPorEdificio($nomeEdificio) {
        $sql = "SELECT tbSala.Id_Sala, tbSala.NomeSala, tbEdificio.NomeEdificio
        FROM tbSala
        INNER JOIN tbEdificio ON tbSala.Id_Edificio = tbEdificio.Id_Edificio
        WHERE tbEdificio.NomeEdificio = :nomeEdificio order by tbSala.Id_Sala;
        ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nomeEdificio', $nomeEdificio);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
