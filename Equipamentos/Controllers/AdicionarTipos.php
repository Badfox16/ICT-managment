<?php
require_once '../Classes/Tipos/TiposDAO.php';
require_once '../Classes/Database/ConexaoBD.php';

// Receba os dados do formulário
$novoTipo = $_POST['novoTipo'];

// Instancie seu TiposDAO (substitua 'SuaConexao' pelo objeto de conexão real)
$tiposDAO = new TiposDAO(ConexaoBD::conectar());

// Tente adicionar o novo tipo
try {
    $sucesso = $tiposDAO->inserirTipo($novoTipo);

    // Verifique se o tipo foi adicionado com sucesso
    if ($sucesso) {
        $response['success'] = true;
    } else {
        $response['error'] = 'Erro ao adicionar tipo ao banco de dados.';
    }
} catch (PDOException $e) {
    // Em caso de erro no banco de dados
    $response['error'] = 'Erro no banco de dados: ' . $e->getMessage();
}

// Retorna a resposta como JSON
echo json_encode($response);

