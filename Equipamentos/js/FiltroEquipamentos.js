
$(document).ready(function () {
    $('#categoryFilter').change(function () {
        var selectedCategory = $(this).val();
        if (selectedCategory === '') {
            // If no category selected, show all equipment
            $('.equipment-row').show();
        } else {
            // Hide all equipment rows
            $('.equipment-row').hide();
            // Show only the selected category equipment
            $('.' + selectedCategory).show();
        }
    });
});
