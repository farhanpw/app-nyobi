// public/js/search.js

document.addEventListener('DOMContentLoaded', function() {
    var searchForm = document.getElementById('searchForm');
    var searchInput = document.getElementById('search');
    var searchResults = document.getElementById('searchResults');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();

        var query = searchInput.value;

        fetch('/search?q=' + query)
            .then(response => response.json())
            .then(data => {
                // Tampilkan hasil pencarian di dalam searchResults
                searchResults.innerHTML = ''; // Hapus hasil pencarian sebelumnya

                if (data.length > 0) {
                    data.forEach(result => {
                        var resultElement = document.createElement('div');
                        resultElement.textContent = result.column_name; // Gantilah column_name sesuai dengan kolom yang sesuai
                        searchResults.appendChild(resultElement);
                    });
                } else {
                    var noResultElement = document.createElement('div');
                    noResultElement.textContent = 'Tidak ada hasil ditemukan.';
                    searchResults.appendChild(noResultElement);
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
