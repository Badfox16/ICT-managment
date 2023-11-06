<?php
require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Patrimonio/PatrimonioDAO.php';
require_once '../Classes/Patrimonio/PatrimonioDTO.php';
require_once '../Classes/Logs/LogsDTO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $contacto = $_POST["contacto"];
    $email = $_POST["email"];
    $usrlogin = $_POST["login"];
    $estado = $_POST["estado"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $PatrimonioDAO = new PatrimonioDAO($conexao);

    try {
        $PatrimonioDTO = new PatrimonioDTO();
        $PatrimonioDTO->setId($id);
        $PatrimonioDTO->setNome($nome);
        $PatrimonioDTO->setApelido($apelido);
        $PatrimonioDTO->setContacto($contacto);
        $PatrimonioDTO->setEmail($email);
        $PatrimonioDTO->setUsrlogin($usrlogin);
        isset($estado) ? $PatrimonioDTO->setEstado(1) : $PatrimonioDTO->setEstado(0);
        $PatrimonioDTO->setSenha($senha);

        // Logs
        $LogsDTO = new LogsDTO();
        $LogsDTO->setUsuario("Usuario");
        $LogsDTO->setAtividade("Atualizou $nome no patrimonio");
        $LogsDTO->setHora(date("Y-m-d H:i:s"));

        $PatrimonioDAO->atualizar($PatrimonioDTO, $LogsDTO);
        header("Location: ../equipamentos.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do Patrimonio: " . $e->getMessage();
        exit();
    }
}
