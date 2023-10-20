var softwareId;

$('#adicionarSoftwareForm').submit(function (event) {
    // Impedir o envio do formulário padrão
    event.preventDefault();

    // Obter os valores dos campos do formulário
    var computadorId = $('#computadorNovo').val();
    var nome = $('#nomeNovo').val();
    var fabricante = $('#fabricanteNovo').val();
    var versao = $('#versaoNovo').val();
    var estado = $('#estadoNovo').val();
    var dataInstalacao = $('#dataInstalacaoNovo').val();
    var observacoes = $('#observacoesNovo').val();
    var dataExpiracao = $('#dataExpiracaoNovo').val();



    // Definir dataExpiracao como null se estiver vazio
    if (dataExpiracao.trim() === '') {
        dataExpiracao = null;
    }

    // Enviar uma solicitação AJAX para adicionar o software
    $.ajax({
        type: 'POST',
        url: '../Softwares/Controllers/adicionarSoftware.php',
        data: {
            computadorNovo: computadorId,
            nomeNovo: nome,
            fabricanteNovo: fabricante,
            versaoNovo: versao,
            estadoNovo: estado,
            dataInstalacaoNovo: dataInstalacao,
            observacoesNovo: observacoes,
            dataExpiracaoNovo: dataExpiracao  // Enviar dataExpiracao diretamente
        },
        dataType: 'json',
        success: function (response) {
            console.log(response)
            // Manipular a resposta do servidor (por exemplo, exibir uma mensagem de sucesso)
            if (response.status === 'success') {
                alert('Software adicionado com sucesso!');
                // Fechar o modal de adição de software, se necessário
                $('#adicionarSoftwareModal').modal('hide');
                // Recarregar a página ou atualizar a lista de softwares, se necessário
                window.location.reload();
            } else {
                alert('Falha ao adicionar o software. Por favor, tente novamente.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.status); // Código de status do erro
            console.log(textStatus);   // Status da solicitação
            console.log(errorThrown);  // Mensagem de erro
            // Manipular erros de solicitação AJAX, se houver
            alert('Erro ao enviar a solicitação. Por favor, tente novamente mais tarde.');
        }
    });
});



// Função para preencher o modal de edição com dados do software
function editarSoftware(id) {

    softwareId = id;
    
    // Faça uma solicitação AJAX para obter dados do software pelo ID
    $.ajax({
        type: 'GET',
        url: `../Softwares/Controllers/obterSoftware.php`,
        data: {
            softwareId: softwareId,
            randomParam: new Date().getTime()
        },// Substitua pelo seu URL de obtenção de dados do software
        dataType: 'json',
        success: function (response) {
            $('#computadorEdit').val(response.Id_Equipamento);
            $('#computadorEdit').val(response.Id_Equipamento);
            console.log(response.Id_Equipamento)
            $('#nomeEdit').val(response.NomeSoftware);
            $('#fabricanteEdit').val(response.Fabricante);
            $('#versaoEdit').val(response.Versao);
            $('#estadoEdit').val(response.Estado);
            $('#dataInstalacaoEdit').val(response.DiaInstalacao);
            $('#dataExpiracaoEdit').val(response.DiaExpiracao);
            $('#observacoesEdit').val(response.Observacoes);


            // Exiba o modal de edição
            $('#editarSoftwareModal').modal('show');
        },
        error: function () {
            alert('Erro ao obter dados do software. Por favor, tente novamente.');
        }
    });
}

// Manipulador de envio do formulário de edição
$('#editarSoftwareForm').submit(function (event) {
    event.preventDefault();
    // Obtenha os valores dos campos do formulário de edição
    var computadorId = $('#computadorEdit').val();
    var nome = $('#nomeEdit').val();
    var fabricante = $('#fabricanteEdit').val();
    var versao = $('#versaoEdit').val();
    var estado = $('#estadoEdit').val();
    var dataInstalacao = $('#dataInstalacaoEdit').val();
    var dataExpiracao = $('#dataExpiracaoEdit').val();
    var observacoes = $('#observacoesEdit').val();


    // Definir dataExpiracao como null se estiver vazio
    if (dataExpiracao.trim() === '') {
        dataExpiracao = null;
    }
    // Faça uma solicitação AJAX para enviar dados atualizados do software
    $.ajax({
        type: 'POST',
        url: '../Softwares/Controllers/editarSoftware.php',
        data: {
            id: softwareId,
            computadorId: computadorId,
            nome: nome,
            fabricante: fabricante,
            versao: versao,
            estado: estado,
            dataInstalacao: dataInstalacao,
            dataExpiracao: dataExpiracao,
            observacoes: observacoes
        },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                alert('Software atualizado com sucesso!');
                // Feche o modal de edição
                $('#editarSoftwareModal').modal('hide');
                // Atualize os dados na tabela ou faça outras ações necessárias
                window.location.reload();

            } else {
                alert('Falha ao atualizar o software. Por favor, tente novamente.');
            }
        },
        error: function () {
            alert('Erro ao enviar dados atualizados do software. Por favor, tente novamente.');
        }
    });
});



// Função para preencher o modal de detalhes com dados do software
function verDetalhesSoftware(id) {
    softwareId = id;
    // Faça uma solicitação AJAX para obter dados do software pelo ID
    $.ajax({
        type: 'GET',
        url: `../Softwares/Controllers/obterSoftware.php`,
        data: {
            softwareId: softwareId
        }, // Substitua pelo seu URL de obtenção de dados do software
        dataType: 'json',
        success: function (response) {
            // Preencha os campos do modal de detalhes com os dados obtidos
            $('#computadorDetalhes').val(response.NrComputador + " - " + response.MarcaComputador + " - " + response.ModeloComputador);
            $('#nomeDetalhes').val(response.NomeSoftware);
            $('#fabricanteDetalhes').val(response.Fabricante);
            $('#versaoDetalhes').val(response.Versao);
            $('#estadoDetalhes').val(response.Estado);
            $('#dataInstalacaoDetalhes').val(response.DiaInstalacao);
            $('#dataExpiracaoDetalhes').val(response.DiaExpiracao);
            $('#observacoesDetalhes').val(response.Observacoes);
            // Preencha outros campos conforme necessário
            // ...

            // Exiba o modal de detalhes
            $('#detalhesSoftwareModal').modal('show');
        },
        error: function () {
            alert('Erro ao obter detalhes do software. Por favor, tente novamente.');
        }
    });
}
