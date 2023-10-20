$(document).ready(function () {
    // Evento de mudança nos filtros de categorias e estados
    $('#computadorFilter, #estadoFilter').on('change', function () {
        var selectedComputer = $('#computadorFilter').val();
        var selectedState = $('#estadoFilter').val().toLowerCase();

        // Esconder todas as linhas da tabela
        $('.software-row').hide();

        // Mostrar apenas as linhas que correspondem às categorias e estado selecionados
        $('.software-row').each(function () {
            var computerMatch = (selectedComputer === '') || ($(this).find('.computadorCol').text().trim() === selectedComputer);
            var stateMatch = (selectedState === '') || ($(this).find('.estadoCol').text().trim().toLowerCase() === selectedState);

            if (computerMatch && stateMatch) {
                $(this).show();
            }
        });
    });
});
