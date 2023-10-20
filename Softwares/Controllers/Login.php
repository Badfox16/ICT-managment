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
        session_start();

        $_SESSION['user_id'] = $ICT['Id_ICT'];
        $_SESSION['user_email'] = $ICT['Email'];
        $_SESSION['user_login'] = $ICT['UsrLogin'];

        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }
}
