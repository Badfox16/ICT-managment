<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';

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

