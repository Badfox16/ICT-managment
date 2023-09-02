<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Admin/AdminDAO.php';
require_once '../Classes/Admin/AdminDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $AdminDTO = new AdminDTO();
    $AdminDTO->setUsrlogin($usrlogin);
    $AdminDTO->setSenha($senha);

    try {
        $conexao = ConexaoBD::conectar();
        $AdminDAO = new AdminDAO($conexao);
        $AdminDAO->inserir($AdminDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

