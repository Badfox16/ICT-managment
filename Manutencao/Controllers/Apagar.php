<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);
    try {
        $ICTDAO->remover($id);
        echo "ICT removido com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao remover ICT: " . $e->getMessage();
    }
}
