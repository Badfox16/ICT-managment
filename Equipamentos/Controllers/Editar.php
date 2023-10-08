<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $estado = $_POST["estado"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $PatrimonioDAO = new PatrimonioDAO($conexao);

    try {
        $PatrimonioDTO = new PatrimonioDTO();
        $PatrimonioDTO->setId($id);
        $PatrimonioDTO->setNome($nome);
        $PatrimonioDTO->setApelido($apelido);
        $PatrimonioDTO->setContacto($contacto);
        $PatrimonioDTO->setUsrlogin($usrlogin);
        $PatrimonioDTO->setEstado($estado);
        $PatrimonioDTO->setSenha($senha);

        $PatrimonioDAO->atualizar($PatrimonioDTO);
        echo "Dados do Patrimonio atualizados com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do Patrimonio: " . $e->getMessage();
    }
}
