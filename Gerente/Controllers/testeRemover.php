<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Gerente/GerenteDAO.php';
require_once '../Classes/Gerente/GerenteDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $conexao = ConexaoBD::conectar();
    $gerenteDAO = new GerenteDAO($conexao);

    try {
        $gerenteDAO->remover($id);
        echo "Gerente removido com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao remover gerente: " . $e->getMessage();
    }
}
