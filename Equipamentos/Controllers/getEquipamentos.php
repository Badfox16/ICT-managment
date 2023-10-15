<?php
require_once '../Classes/Equipamentos/EquipamentoDAO.php';
require_once '../Classes/Database/ConexaoBD.php';

// getEquipamentos.php
header('Content-Type: application/json');

// Verifique se o ID do equipamento foi fornecido na solicitação GET
if (!isset($_GET['equipamentoId'])) {
    echo json_encode(['error' => 'ID do equipamento não fornecido']);
    exit; // Interrompe a execução do script após enviar a resposta JSON
}

// Obtenha o ID do equipamento da solicitação GET
$equipamentoId = $_GET['equipamentoId'];

// Instancie seu EquipamentoDAO (substitua 'SuaConexao' pelo objeto de conexão real)
$equipamentoDAO = new EquipamentoDAO(ConexaoBD::conectar());

// Obtenha detalhes do equipamento com base no ID
$equipamentoDetails = $equipamentoDAO->buscarPorId($equipamentoId);

// Verifique se o equipamento foi encontrado
if ($equipamentoDetails) {
    // Se o equipamento for encontrado, retorne os detalhes como JSON
    echo json_encode($equipamentoDetails);
} else {
    // Se o equipamento não for encontrado, retorne um JSON vazio ou uma mensagem de erro
    echo json_encode(['error' => 'Equipamento não encontrado']);
}

exit; // Interrompe a execução do script após enviar a resposta JSON

