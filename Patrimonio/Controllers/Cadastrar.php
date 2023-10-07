<?php

require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';
require_once '../Classes/Logs/LogsDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $email = $_POST["email"];
    $contacto = $_POST["contacto"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    // Logs
    $usuario = $_POST["usuario"];

    $PatrimonioDTO = new PatrimonioDTO();
    $PatrimonioDTO->setNome($nome);
    $PatrimonioDTO->setApelido($apelido);
    $PatrimonioDTO->setContacto($contacto);
    $PatrimonioDTO->setEmail($email);
    $PatrimonioDTO->setUsrlogin($usrlogin);
    $PatrimonioDTO->setEstado(1);
    $PatrimonioDTO->setSenha($senha);

    $LogsDTO = new LogsDTO();
    $LogsDTO->setUsuario("Usuario");
    $LogsDTO->setAtividade("Cadastrou um novo patrimonio");
    $LogsDTO->setHora(date("Y-m-d H:i:s"));

    try {
        $conexao = ConexaoBD::conectar();
        $PatrimonioDAO = new PatrimonioDAO($conexao);
        $PatrimonioDAO->inserir($PatrimonioDTO, $LogsDTO);
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
