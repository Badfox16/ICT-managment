<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Gerente/GerenteDAO.php';
require_once '../Classes/Gerente/GerenteDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $gerenteDAO = new GerenteDAO($conexao);

    try {
        $gerenteDTO = new GerenteDTO();
        $gerenteDTO->setId($id);
        $gerenteDTO->setNome($nome);
        $gerenteDTO->setApelido($apelido);
        $gerenteDTO->setContacto($contacto);
        $gerenteDTO->setUsrlogin($usrlogin);
        $gerenteDTO->setSenha($senha);

        $gerenteDAO->atualizar($gerenteDTO);
        echo "Dados do gerente atualizados com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do gerente: " . $e->getMessage();
    }
}
