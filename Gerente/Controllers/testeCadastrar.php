<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Gerente/GerenteDAO.php';
require_once '../Classes/Gerente/GerenteDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $gerenteDTO = new GerenteDTO();
    $gerenteDTO->setNome($nome);
    $gerenteDTO->setApelido($apelido);
    $gerenteDTO->setContacto($contacto);
    $gerenteDTO->setUsrlogin($usrlogin);
    $gerenteDTO->setSenha($senha);

    try {
        $conexao = ConexaoBD::conectar();
        $gerenteDAO = new GerenteDAO($conexao);
        $gerenteDAO->inserir($gerenteDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

