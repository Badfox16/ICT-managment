<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';
require_once '../Classes/Logs/LogsDTO.php';

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
        session_start();

        $_SESSION['patrimonio_id'] = $Patrimonio['Id_Patrimonio'];
        $_SESSION['patrimonio_email'] = $Patrimonio['Email'];
        $_SESSION['patrimonio_login'] = $Patrimonio['UsrLogin'];

        header("Location: ../Equipamentos/equipamentos.php");
        exit();
    } else {
        echo "Credenciais inválidas";
        header("Location: ../Login.php");
        exit();
    }
}
