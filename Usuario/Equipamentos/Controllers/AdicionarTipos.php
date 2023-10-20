<?php
require_once '../Classes/Tipos/TiposDAO.php';
require_once '../Classes/Database/ConexaoBD.php';

// Receba os dados do formulário
$novoTipo = $_POST['novoTipo'];

// Instancie seu TiposDAO (substitua 'SuaConexao' pelo objeto de conexão real)
$tiposDAO = new TiposDAO(ConexaoBD::conectar());
$tiposDAO2 = new TiposDAO(ConexaoBD::conectar());

$tiposDAO2->deletarTipoPorNome("todosEquipamentos");

// Verifique se já existe um tipo com o mesmo nome
if ($tiposDAO->existeTipoComNome($novoTipo)) {
    $response['error'] = 'Já existe um tipo com este nome no banco de dados.';
} else {
    // Tente adicionar o novo tipo
    try {
        $sucesso = $tiposDAO->inserirTipo($novoTipo);

         // Deleta o tipo pelo nome
     
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
}

// Retorna a resposta como JSON
echo json_encode($response);
?>
