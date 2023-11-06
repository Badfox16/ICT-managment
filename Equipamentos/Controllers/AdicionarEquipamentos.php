<?php
require_once '../Classes/Equipamentos/EquipamentoDAO.php';
require_once '../../db/ConexaoDB.php';

// Receba os dados do formulário
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$nrDeSerie = $_POST['nrDeSerie'];
$estado = $_POST['estado'];
$localizacao = $_POST['localizacao'];
$fornecedor = $_POST['fornecedor'];
$dataFornecimento = $_POST['dataFornecimento'];
$descricaoEquipamento = $_POST['descricaoEquipamento'];
$observacoes = $_POST['observacoes'];

// Instancie seu EquipamentoDAO (substitua 'SuaConexao' pelo objeto de conexão real)
$equipamentoDAO = new EquipamentoDAO(ConexaoBD::conectar());

// Crie um objeto EquipamentoDTO com os dados recebidos
$equipamento = new EquipamentoDTO();
$equipamento->setTipo($tipo);
$equipamento->setMarca($marca);
$equipamento->setModelo($modelo);
$equipamento->setNrDeSerie($nrDeSerie);
$equipamento->setEstado($estado);
$equipamento->setLocalizacao($localizacao);
$equipamento->setFornecedor($fornecedor);
$equipamento->setDataFornecimento($dataFornecimento);
$equipamento->setDescricaoEquipamento($descricaoEquipamento);
$equipamento->setObservacoes($observacoes);

try {
    $equipamentoDAO->inserir($equipamento);
    echo json_encode(['success' => 'Equipamento adicionado com sucesso']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
