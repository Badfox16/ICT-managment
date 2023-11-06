<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $ICTDTO = new ICTDTO();
    $ICTDTO->setUsrlogin($usrlogin);
    $ICTDTO->setSenha($senha);

    try {
        $conexao = ConexaoBD::conectar();
        $ICTDAO = new ICTDAO($conexao);
        $ICTDAO->inserir($ICTDTO);
        echo "Inserção bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

