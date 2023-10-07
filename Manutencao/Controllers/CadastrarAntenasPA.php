<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idAntenasPA = $_POST["AntenasPA"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];


    $ManutencaoDTO = new ManutencaoDTO();
    $ManutencaoDTO->setIdAntenasPA($idAntenasPA);
    $ManutencaoDTO->setTitulo($titulo);
    $ManutencaoDTO->setDescricao($descricao);


    try {
        $conexao = ConexaoBD::conectar();
        $ManutencaoDAO = new ManutencaoDAO($conexao);
        $ManutencaoDAO->inserirAntenasPA($ManutencaoDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
