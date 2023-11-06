<?php

header('Content-Type: application/json');

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/Softwares/SoftwareDAO.php';
require_once '../Classes/Softwares/SoftwareDTO.php';


try {

    // Obter dados do formulário
    $computadorId = $_POST['computadorNovo'];
    $nome = $_POST['nomeNovo'];
    $fabricante = $_POST['fabricanteNovo'];
    $versao = $_POST['versaoNovo'];
    $estado = $_POST['estadoNovo'];
    $dataInstalacao = $_POST['dataInstalacaoNovo'];
    $observacoes = $_POST['observacoesNovo'];
    $dataExpiracao = $_POST['dataExpiracaoNovo'];


    // Inicializar a conexão com o banco de dados
    $conexao = ConexaoBD::conectar();
    $softwareDAO = new SoftwareDAO($conexao);

    // Verificar se dataExpiracao é uma string de data válida
    if ($dataExpiracao !== null && !DateTime::createFromFormat('Y-m-d', $dataExpiracao)) {
        // Se não for uma data válida, definir como null
        $dataExpiracao = null;
    }


    // Criar um objeto SoftwareDTO com os dados do formulário
    $softwareDTO = new SoftwareDTO();
    $softwareDTO->setIdEquipamento($computadorId);
    $softwareDTO->setNomeSoftware($nome);
    $softwareDTO->setFabricante($fabricante);
    $softwareDTO->setVersao($versao);
    $softwareDTO->setEstado($estado);
    $softwareDTO->setDiaInstalacao($dataInstalacao);
    $softwareDTO->setDiaExpiracao($dataExpiracao);
    $softwareDTO->setObservacoes($observacoes);

    // Instanciar SoftwareDAO e adicionar o software ao banco de dados
    $softwareDAO->inserir($softwareDTO);

    // Responder ao cliente (pode ser um JSON, se preferir)
    $data = array(
        'status' => 'success',
        'message' => 'Software adicionado com sucesso',
        'dataExpiracao' => $dataExpiracao !== null ? $dataExpiracao : null
    );

    echo json_encode($data);
    die();
} catch (Exception $e) {
    error_log("Mensagem de erro ou depuração");
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
