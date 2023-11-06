<?php

require_once '../Classes/Tipos/TiposDAO.php';
require_once '../../db/ConexaoDB.php';

// Receba os dados do formulário via POST
$idTipoExistente = $_POST['tipoExistente']; // Obtém o ID do tipo existente
$novoNomeTipo = $_POST['novoNomeTipo'];

// Instancie seu TiposDAO (substitua 'SuaConexao' pelo objeto de conexão real)
$tiposDAO = new TiposDAO(ConexaoBD::conectar());

// Verifique se já existe um tipo com o mesmo nome
if ($tiposDAO->existeTipoComNome($novoNomeTipo)) {
    $response['error'] = 'Já existe um tipo com este nome no banco de dados.';
} else {
    // Tente atualizar o tipo
    try {
        $sucesso = $tiposDAO->atualizarTipo($idTipoExistente, $novoNomeTipo);

        // Verifique se o tipo foi editado com sucesso
        if ($sucesso) {
            $response['success'] = true;
        } else {
            $response['error'] = 'Erro ao editar tipo no banco de dados.';
        }
    } catch (PDOException $e) {
        // Em caso de erro no banco de dados
        $response['error'] = 'Erro no banco de dados: ' . $e->getMessage();
    }
}

// Retorna a resposta como JSON
echo json_encode($response);
