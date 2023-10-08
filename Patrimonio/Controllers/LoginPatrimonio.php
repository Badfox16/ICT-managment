<?php
require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/ICTDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $PatrimonioDAO = new PatrimonioDAO($conexao);

    $Patrimonio = $PatrimonioDAO->login($email, $senha);

    if ($Patrimonio) {
        header("Location: ../ListarPatirmonio.php");
        exit();
    } else {
        echo "Credenciais inválidas";
        header("Location: ../LoginICT.php");
        exit();
    }
}
