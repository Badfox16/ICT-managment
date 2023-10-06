<?php
require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);

    $ICT = $ICTDAO->login($email, $senha);

    if ($ICT) {
        header("Location: ../ListarICT.php");
        exit();
    } else {
        echo "Credenciais inválidas";
        header("Location: ../LoginICT.php");
        exit();
    }
}
