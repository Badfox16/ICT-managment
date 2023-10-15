$(document).ready(function () {
    // Evento de mudança nos filtros de categorias e estados
    $('#categoryFilter, #estadoFilter').on('change', function () {
        var selectedCategory = $('#categoryFilter').val();
        var selectedState = $('#estadoFilter').val().toLowerCase();

        // Esconder todas as linhas da tabela
        $('.equipment-row').hide();

        // Mostrar apenas as linhas que correspondem às categorias e estado selecionados
        $('.equipment-row').each(function () {
            var categoryMatch = (selectedCategory === '') || $(this).hasClass(selectedCategory);
            var stateMatch = (selectedState === '') || ($(this).find('.estadoCol').text().trim().toLowerCase() === selectedState);

            if (categoryMatch && stateMatch) {
                $(this).show();
            }
        });
    });
});
