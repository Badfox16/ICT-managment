<?php
require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $PatrimonioDAO = new PatrimonioDAO($conexao);

     // Logs
     $LogsDTO = new LogsDTO();
     $LogsDTO->setUsuario("Usuario");
     $LogsDTO->setAtividade("O email: $email logou no sistema");
     $LogsDTO->setHora(date("Y-m-d H:i:s"));

    $Patrimonio = $PatrimonioDAO->login($email, $senha, $LogsDTO);

    if ($Patrimonio) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Credenciais inválidas";
        header("Location: ../Login.php");
        exit();
    }
}
