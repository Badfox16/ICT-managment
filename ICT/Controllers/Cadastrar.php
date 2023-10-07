<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usrlogin = $_POST["username"];
    $email = $_POST["email"];
    $estado = $_POST["estado"];

    $ICTDTO = new ICTDTO();
    $ICTDTO->setUsrlogin($usrlogin);
    $ICTDTO->setEmail($email);
    $ICTDTO->setEstado($estado);
    $ICTDTO->setSenha($usrlogin);

    try {
        $conexao = ConexaoBD::conectar();
        $ICTDAO = new ICTDAO($conexao);
        $ICTDAO->inserir($ICTDTO);
       
        header("Location: ../ListarICT.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

