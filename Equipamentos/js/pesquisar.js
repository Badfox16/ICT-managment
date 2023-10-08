$(document).ready(function () {
    $('#searchInput').on('input', function () {
        
        var searchTerm = $(this).val().toLowerCase();
        $('.equipment-row').each(function () {
            var type = $(this).find('td:nth-child(3)').text().toLowerCase();
            var serialNumber = $(this).find('td:nth-child(2)').text().toLowerCase();
            var brand = $(this).find('td:nth-child(4)').text().toLowerCase();
            var model = $(this).find('td:nth-child(5)').text().toLowerCase();
            if (type.includes(searchTerm) || serialNumber.includes(searchTerm) || brand.includes(searchTerm) || model.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});