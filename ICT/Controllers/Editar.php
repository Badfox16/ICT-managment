<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $usrlogin = $_POST["usrLogin"];
    $email = $_POST["email"];
    $estado = $_POST["estado"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);

    try {
        $ICTDTO = new ICTDTO();
        $ICTDTO->setId($id);
        $ICTDTO->setUsrlogin($usrlogin);
        $ICTDTO->setEstado($estado);
        $ICTDTO->setEmail($email);
        $ICTDTO->setSenha($senha);

        $ICTDAO->atualizar($ICTDTO);
        
        header("Location: ../Perfil.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do ICT: " . $e->getMessage();
    }
}
