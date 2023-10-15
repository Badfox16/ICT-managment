// Variável global para armazenar o ID do equipamento que será editado
var equipamentoId;

// Função para editar um equipamento
function editarEquipamento(id) {
    // Armazena o ID do equipamento na variável global
    equipamentoId = id;

    // Use AJAX para obter detalhes do equipamento com base no ID
    $.ajax({
        url: '../Equipamentos/Controllers/getEquipamentos.php',
        method: 'GET',
        data: {
            equipamentoId: equipamentoId
        },
        dataType: 'json',
        success: function (response) {
            // Preenche os campos de formulário no modal de edição com os detalhes do equipamento
            $('#tipoEdit').val(response.Tipo);
            $('#marcaEdit').val(response.Marca);
            $('#modeloEdit').val(response.Modelo);
            $('#nrDeSerieEdit').val(response.NrDeSerie);
            $('#estadoEdit').val(response.Estado);
            $('#localizacaoEdit').val(response.Localizacao);
            $('#fornecedorEdit').val(response.Fornecedor);
            $('#dataFornecimentoEdit').val(response.DataFornecimento);
            $('#descricaoEquipamentoEdit').val(response.DescricaoEquipamento);
            $('#observacoesEdit').val(response.Observacoes);

            // Exibe o modal de edição
            $('#editarEquipamentoModal').modal('show');
        },
        error: function () {
            // Em caso de erro, exiba uma mensagem genérica ou trate conforme necessário
            alert('Erro ao obter detalhes do equipamento para edição.');
        }
    });
}

// Função para atualizar o equipamento após a edição
function salvarEdicaoEquipamento() {
    // Obtenha os valores dos campos de formulário editados
    var tipo = $('#tipoEdit').val();
    var marca = $('#marcaEdit').val();
    var modelo = $('#modeloEdit').val();
    var nrDeSerie = $('#nrDeSerieEdit').val();
    var estado = $('#estadoEdit').val();
    var localizacao = $('#localizacaoEdit').val();
    var fornecedor = $('#fornecedorEdit').val();
    var dataFornecimento = $('#dataFornecimentoEdit').val();
    var descricaoEquipamento = $('#descricaoEquipamentoEdit').val();
    var observacoes = $('#observacoesEdit').val();

    // Use AJAX para enviar os dados atualizados para o arquivo PHP que processa a edição
    $.ajax({
        url: '../Equipamentos/Controllers/EditarEquipamento.php',
        method: 'POST',
        data: {
            equipamentoId: equipamentoId,
            tipo: tipo,
            marca: marca,
            modelo: modelo,
            nrDeSerie: nrDeSerie,
            estado: estado,
            localizacao: localizacao,
            fornecedor: fornecedor,
            dataFornecimento: dataFornecimento,
            descricaoEquipamento: descricaoEquipamento,
            observacoes: observacoes
            // Adicione outros campos de formulário conforme necessário
        },
        success: function (response) {
            // Em caso de sucesso, recarregue a página
            window.location.reload();
        },
        error: function () {
            // Em caso de erro, exiba uma mensagem genérica ou trate conforme necessário
            alert('Erro ao editar o equipamento.');
        }
    });
}

// Manipulador de evento para o envio do formulário
$('#editarEquipamentoForm').submit(function (event) {
    event.preventDefault(); // Previne o comportamento padrão do formulário
    salvarEdicaoEquipamento(); // Chama a função para salvar as alterações
});


// Função para ver detalhes de um equipamento
function verDetalhesEquipamento(id) {
    // Use AJAX para obter detalhes do equipamento com base no ID
    $.ajax({
        url: '../Equipamentos/Controllers/getEquipamentos.php',
        method: 'GET',
        data: {
            equipamentoId: id
        },
        dataType: 'json',
        success: function (response) {
            // Preenche os campos do modal de detalhes com os detalhes do equipamento
            $('#tipoDetalhes').val(response.Tipo);
            $('#marcaDetalhes').val(response.Marca);
            $('#modeloDetalhes').val(response.Modelo);
            $('#nrDeSerieDetalhes').val(response.NrDeSerie);
            $('#estadoDetalhes').val(response.Estado); // Use .val() para campos de seleção
            $('#localizacaoDetalhes').val(response.Localizacao);
            $('#fornecedorDetalhes').val(response.Fornecedor);
            $('#dataFornecimentoDetalhes').val(response.DataFornecimento); // Use .val() para campos de data
            $('#descricaoEquipamentoDetalhes').val(response.DescricaoEquipamento);
            $('#observacoesDetalhes').val(response.Observacoes);

            // Exibe o modal de detalhes
            $('#verDetalhesEquipamentoModal').modal('show');
        },
        error: function () {
            // Em caso de erro, exiba uma mensagem genérica ou trate conforme necessário
            alert('Erro ao obter detalhes do equipamento.');
        }
    });
}

$('#adicionarEquipamentoForm').submit(function (event) {
    event.preventDefault();

    // Obtenha os valores dos campos do formulário
    var tipo = $('#tipoNovo').val();
    var marca = $('#marcaNovo').val();
    var modelo = $('#modeloNovo').val();
    var nrDeSerie = $('#nrDeSerieNovo').val();
    var estado = $('#estadoNovo').val();
    var localizacao = $('#localizacaoNovo').val();
    var fornecedor = $('#fornecedorNovo').val();
    var dataFornecimento = $('#dataFornecimentoNovo').val();
    var descricaoEquipamento = $('#descricaoEquipamentoNovo').val();
    var observacoes = $('#observacoesNovo').val();
    // Adicione outros campos conforme necessário

    // Envie uma solicitação AJAX para adicionar o equipamento
    $.ajax({
        url: '../Equipamentos/Controllers/AdicionarEquipamentos.php',
        method: 'POST',
        data: {
            tipo: tipo,
            marca: marca,
            modelo: modelo,
            nrDeSerie: nrDeSerie,
            estado: estado,
            localizacao: localizacao,
            fornecedor: fornecedor,
            dataFornecimento: dataFornecimento,
            descricaoEquipamento: descricaoEquipamento,
            observacoes: observacoes
            // Adicione outros campos conforme necessário
        },
        success: function (response) {
            // Em caso de sucesso, você pode atualizar a tabela de equipamentos ou fazer outras ações necessárias
            // Por exemplo, recarregue a página para mostrar o novo equipamento na lista
            window.location.reload();
        },
        error: function () {
            // Em caso de erro, exiba uma mensagem de erro ou trate conforme necessário
            alert('Erro ao adicionar o equipamento.');
        }
    });
});


$('#adicionarTipoForm').submit(function (event) {
    event.preventDefault(); // Evita o comportamento padrão do formulário

    var novoTipo = $('#novoTipo').val();

    // Use AJAX para enviar os dados para o arquivo PHP que processa a adição do tipo
    $.ajax({
        url: '../Equipamentos/Controllers/AdicionarTipos.php',
        method: 'POST',
        data: {
            novoTipo: novoTipo
        },
        dataType: 'json',
        success: function (response) {
            // Manipule a resposta do servidor conforme necessário
            if (response.success) {
                // Tipo adicionado com sucesso
                alert('Tipo adicionado com sucesso!');
                $('#adicionarTipoModal').modal('hide'); // Fecha o modal após adição bem-sucedida
                window.location.reload();
            } else {
                // Erro ao adicionar tipo
                alert('Erro ao adicionar tipo: ' + response.error);
            }
        },
        error: function () {
            // Em caso de erro na requisição AJAX
            alert('Erro ao enviar requisição para adicionar tipo.');
        }
    });
});