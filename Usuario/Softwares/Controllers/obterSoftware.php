<?php

header('Content-Type: application/json');

require_once __DIR__ .'/../../../db/ConexaoDB.php';
require_once '../Classes/Softwares/SoftwareDAO.php';





// Verifica se a requisição é do tipo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['softwareId'])) {
        echo json_encode(['error' => 'ID do equipamento não fornecido']);
        exit; // Interrompe a execução do script após enviar a resposta JSON
    }
    // Obtém o ID do software da consulta da URL
    $softwareId = $_GET['softwareId'];

    // Conectar ao banco de dados
    $conexao = ConexaoBD::conectar();
    $softwareDAO = new SoftwareDAO($conexao);

    // Buscar o software pelo ID
    $software = $softwareDAO->buscarPorId($softwareId);

    // Verificar se o software foi encontrado
    if ($software) {
        // Retorna os dados do software em formato JSON
        echo json_encode($software);
    } else {
        // Se o software não for encontrado, retorna uma resposta de erro em formato JSON
        echo json_encode(['error' => 'Software não encontrado']);
    }
} else {
    // Se a requisição não for do tipo GET, retorna erro em formato JSON
    echo json_encode(['error' => 'Método de requisição inválido']);
}
?>
