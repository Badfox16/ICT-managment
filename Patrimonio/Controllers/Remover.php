<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $conexao = ConexaoBD::conectar();
    $PatrimonioDAO = new PatrimonioDAO($conexao);

    try {
        $PatrimonioDAO->remover($id);
        echo "Gerente de Patrimonio removido com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao remover Patrimonio: " . $e->getMessage();
    }
}
