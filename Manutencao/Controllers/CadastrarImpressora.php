<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idImpressora = $_POST["Impressora"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];


    $ManutencaoDTO = new ManutencaoDTO();
    $ManutencaoDTO->setIdImpressora($idImpressora);
    $ManutencaoDTO->setTitulo($titulo);
    $ManutencaoDTO->setDescricao($descricao);


    try {
        $conexao = ConexaoBD::conectar();
        $ManutencaoDAO = new ManutencaoDAO($conexao);
        $ManutencaoDAO->inserirImpressora($ManutencaoDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
