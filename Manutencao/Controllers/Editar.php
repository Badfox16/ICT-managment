<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Manutencao/ManutencaoDTO.php';
require_once '../Classes/Manutencao/ManutencaoDAO.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $usrlogin = $_POST["login"];
    $senha = $_POST["senha"];

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);

    try {
        $ICTDTO = new ICTDTO();
        $ICTDTO->setId($id);
        $ICTDTO->setUsrlogin($usrlogin);
        $ICTDTO->setSenha($senha);

        $ICTDAO->atualizar($ICTDTO);
        echo "Dados do ICT atualizados com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao atualizar dados do ICT: " . $e->getMessage();
    }
}
