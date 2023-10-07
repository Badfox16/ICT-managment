<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    $conexao = ConexaoBD::conectar();
    $ManutencaoDAO = new ManutencaoDAO($conexao);

    try {
        $ManutencaoDTO = new ManutencaoDTO();
        $ManutencaoDTO->setIdManutencao($id);
        $ManutencaoDTO->setTitulo($titulo);
        $ManutencaoDTO->setDescricao($descricao);

        $ManutencaoDAO->atualizar($ManutencaoDTO);
        echo "Dados do Manutencao atualizados com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do Manutencao: " . $e->getMessage();
    }
}
