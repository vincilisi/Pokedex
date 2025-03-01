document.addEventListener("DOMContentLoaded", function() {
    var nameFilterInput = document.getElementById('name-filter');
    var typeFilterSelect = document.getElementById('type-filter');
    var sortButton = document.getElementById('sort-button');
    var pokemonList = document.getElementById('pokemon-list');
    var pokemonCards = Array.from(pokemonList.getElementsByClassName('pokemon-card'));
    var originalOrder = pokemonCards.slice(); // Salva l'ordine originale
    var isSortedAlphabetically = false; // Stato di ordinamento

    nameFilterInput.addEventListener('input', filterPokemons);
    typeFilterSelect.addEventListener('change', filterPokemons);
    sortButton.addEventListener('click', toggleSort);

    function filterPokemons() {
        var nameFilter = nameFilterInput.value.toLowerCase();
        var typeFilter = typeFilterSelect.value.toLowerCase();

        pokemonCards.forEach(function(card) {
            var name = card.getAttribute('data-name').toLowerCase();
            var types = card.getAttribute('data-types').toLowerCase();

            var nameMatch = name.includes(nameFilter);
            var typeMatch = typeFilter === "" || types.includes(typeFilter);

            if (nameMatch && typeMatch) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function toggleSort() {
        if (isSortedAlphabetically) {
            resetOrder();
            sortButton.textContent = "Ordina Alfabeticamente";
        } else {
            sortAlphabetically();
            sortButton.textContent = "Ordina in modo Numerico";
        }
        isSortedAlphabetically = !isSortedAlphabetically;
    }

    function sortAlphabetically() {
        var sortedCards = pokemonCards.slice().sort(function(a, b) {
            var nameA = a.getAttribute('data-name').toLowerCase();
            var nameB = b.getAttribute('data-name').toLowerCase();
            if (nameA < nameB) return -1;
            if (nameA > nameB) return 1;
            return 0;
        });

        while (pokemonList.firstChild) {
            pokemonList.removeChild(pokemonList.firstChild);
        }

        sortedCards.forEach(function(card) {
            pokemonList.appendChild(card);
        });
    }

    function resetOrder() {
        while (pokemonList.firstChild) {
            pokemonList.removeChild(pokemonList.firstChild);
        }

        originalOrder.forEach(function(card) {
            pokemonList.appendChild(card);
        });
    }
});
