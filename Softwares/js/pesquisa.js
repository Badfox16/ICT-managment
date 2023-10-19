const searchInput = document.getElementById('searchInput');

searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase();
    const softwareRows = document.querySelectorAll('.software-row');

    softwareRows.forEach(function(row) {
        const nomeSoftware = row.children[2].textContent.toLowerCase();
        const fabricante = row.children[3].textContent.toLowerCase();
        const dataInstalacao = row.children[5].textContent.toLowerCase();
        
        if (nomeSoftware.includes(searchTerm) || fabricante.includes(searchTerm) || dataInstalacao.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});


