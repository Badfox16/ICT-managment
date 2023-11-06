<?php
require_once __DIR__ .'/../../../db/ConexaoDB.php';
require_once '../Classes/Sala/SalaDAO.php';
require_once '../Classes/Sala/SalaDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["salaId"];
    $nomeSala = $_POST["sala"];
    $idEdificio = $_POST["edificio"];

    $conexao = ConexaoBD::conectar();
    $SalaDAO = new SalaDAO($conexao);

    try {
        $SalaDTO = new SalaDTO();
        $SalaDTO->setId($id);
        $SalaDTO->setNomeSala($nomeSala);
        $SalaDTO->setId_edificio($idEdificio);


        $SalaDAO->atualizar($SalaDTO);
        
        header("Location: ../equipamentos.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do Sala: " . $e->getMessage();
    }
}
