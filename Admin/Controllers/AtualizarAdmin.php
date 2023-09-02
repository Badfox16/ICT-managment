<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Admin/AdminDAO.php';
require_once '../Classes/Admin/AdminDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $AdminDAO = new AdminDAO($conexao);

    try {
        $AdminDTO = new AdminDTO();
        $AdminDTO->setId($id);
        $AdminDTO->setUsrlogin($usrlogin);
        $AdminDTO->setSenha($senha);

        $AdminDAO->atualizar($AdminDTO);
        echo "Dados do Admin atualizados com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do Admin: " . $e->getMessage();
    }
}
