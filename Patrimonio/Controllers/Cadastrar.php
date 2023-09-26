<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $PatrimonioDTO = new PatrimonioDTO();
    $PatrimonioDTO->setNome($nome);
    $PatrimonioDTO->setApelido($apelido);
    $PatrimonioDTO->setContacto($contacto);
    $PatrimonioDTO->setUsrlogin($usrlogin);
    $PatrimonioDTO->setSenha($senha);

    try {
        $conexao = ConexaoBD::conectar();
        $PatrimonioDAO = new PatrimonioDAO($conexao);
        $PatrimonioDAO->inserir($PatrimonioDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

