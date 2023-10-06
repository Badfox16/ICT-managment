<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $email = $_POST["email"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];


    $PatrimonioDTO = new PatrimonioDTO();
    $PatrimonioDTO->setNome($nome);
    $PatrimonioDTO->setApelido($apelido);
    $PatrimonioDTO->setContacto($contacto);
    $PatrimonioDTO->setEmail($email);
    $PatrimonioDTO->setUsrlogin($usrlogin);
    $PatrimonioDTO->setEstado(1);
    $PatrimonioDTO->setSenha($senha);


    try {
        $conexao = ConexaoBD::conectar();
        $PatrimonioDAO = new PatrimonioDAO($conexao);
        $PatrimonioDAO->inserir($PatrimonioDTO);
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
