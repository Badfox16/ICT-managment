<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Admin/AdminDAO.php';
require_once '../Classes/Admin/AdminDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $conexao = ConexaoBD::conectar();
    $AdminDAO = new AdminDAO($conexao);
    try {
        $AdminDAO->remover($id);
        echo "Admin removido com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao remover Admin: " . $e->getMessage();
    }
}
