<?php
header('Content-Type: application/json');

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Softwares/SoftwareDAO.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $idSoftware = $_POST['id'];
    $computadorId = $_POST['computadorId'];
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $versao = $_POST['versao'];
    $estado = $_POST['estado'];
    $dataInstalacao = $_POST['dataInstalacao'];
    $dataExpiracao = $_POST['dataExpiracao'];
    $observacoes = $_POST['observacoes'];

    // Conectar ao banco de dados
    $conexao = ConexaoBD::conectar();
    $softwareDAO = new SoftwareDAO($conexao);

    if ($dataExpiracao !== null && !DateTime::createFromFormat('Y-m-d', $dataExpiracao)) {
        // Se não for uma data válida, definir como null
        $dataExpiracao = null;
    }

    

    // Criar um objeto SoftwareDTO com os dados do formulário
    $software = new SoftwareDTO();
    $software->setIdSoftware($idSoftware);
    $software->setIdEquipamento($computadorId);
    $software->setNomeSoftware($nome);
    $software->setFabricante($fabricante);
    $software->setVersao($versao);
    $software->setEstado($estado);
    $software->setDiaInstalacao($dataInstalacao);
    $software->setDiaExpiracao($dataExpiracao);
    $software->setObservacoes($observacoes);

    // Atualizar o software no banco de dados
    try {
        $softwareDAO->atualizar($software);
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Se a requisição não for do tipo POST, retorna erro em formato JSON
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido']);
}
?>
