<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Sala/SalaDAO.php';
require_once '../Classes/Sala/SalaDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nomeSala = $_POST["sala"];
    $edificio = $_POST["edificio"];
    


    $SalaDTO = new SalaDTO();
    $SalaDTO->setNomeSala($nomeSala);
    $SalaDTO->setId_edificio($edificio);

    try {
        $conexao = ConexaoBD::conectar();
        $SalaDAO = new SalaDAO($conexao);
        $SalaDAO->inserir($SalaDTO);
       
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

