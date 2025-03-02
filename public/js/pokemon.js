document.addEventListener("DOMContentLoaded", function() {
    var nameFilterInput = document.getElementById('name-filter');
    var typeFilterButton = document.getElementById('typeDropdown');
    var typeDropdownMenu = document.getElementById('type-dropdown-menu');
    var sortButton = document.getElementById('sort-button');
    var pokemonList = document.getElementById('pokemon-list');
    var pokemonCards = Array.from(pokemonList.getElementsByClassName('pokemon-card'));
    var originalOrder = pokemonCards.slice(); // Salva l'ordine originale
    var isSortedAlphabetically = false; // Stato di ordinamento

    var typeTranslations = {
        "grass": "erba",
        "poison": "veleno",
        "fire": "fuoco",
        "flying": "volante",
        "water": "acqua",
        "bug": "coleottero",
        "normal": "normale",
        "electric": "elettro",
        "ground": "terra",
        "fairy": "folletto",
        "fighting": "lotta",
        "psychic": "psico",
        "rock": "roccia",
        "steel": "acciaio",
        "ice": "ghiaccio",
        "ghost": "spettro",
        "dragon": "drago",
        "dark": "buio"
    };

    nameFilterInput.addEventListener('input', filterPokemons);
    sortButton.addEventListener('click', toggleSort);

    fetch('/data/pokemon.json')
        .then(response => response.json())
        .then(data => {
            var types = new Set();
            data.forEach(pokemon => {
                if (pokemon.tipo && Array.isArray(pokemon.tipo)) {
                    pokemon.tipo.forEach(type => types.add(type));
                }
            });

            // Aggiungi l'opzione "Seleziona Tipo" al menu dropdown
            var defaultOption = document.createElement('li');
            var defaultA = document.createElement('a');
            defaultA.href = "#";
            defaultA.className = "dropdown-item";
            defaultA.setAttribute('data-value', "");
            defaultA.textContent = "Seleziona Tipo";
            defaultA.addEventListener('click', function(event) {
                event.preventDefault();
                typeFilterButton.innerHTML = "Seleziona Tipo";
                filterPokemons();
            });
            defaultOption.appendChild(defaultA);
            typeDropdownMenu.appendChild(defaultOption);

            // Popola il dropdown con i tipi di Pokémon e immagini
            types.forEach(type => {
                var englishType = Object.keys(typeTranslations).find(key => typeTranslations[key] === type);
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = "#";
                a.className = "dropdown-item";
                a.setAttribute('data-value', type.toLowerCase());
                a.innerHTML = `<img src="http://127.0.0.1:8000/media/icons/Pokemon_Type_Icon_${englishType}.png" width="20" height="20" /> ${type}`;
                a.addEventListener('click', function(event) {
                    event.preventDefault();
                    typeFilterButton.innerHTML = `<img src="http://127.0.0.1:8000/media/icons/Pokemon_Type_Icon_${englishType}.png" width="20" height="20" /> ${type}`;
                    filterPokemons();
                });
                li.appendChild(a);
                typeDropdownMenu.appendChild(li);
            });
        })
        .catch(error => console.error("Errore nel caricamento dei dati:", error));

    function filterPokemons() {
        var nameFilter = nameFilterInput.value.toLowerCase();
        var typeFilter = typeFilterButton.textContent.trim().toLowerCase();

        pokemonCards.forEach(function(card) {
            var name = card.getAttribute('data-name').toLowerCase();
            var types = card.getAttribute('data-types').toLowerCase();

            var nameMatch = name.includes(nameFilter);
            var typeMatch = typeFilter === "seleziona tipo" || types.includes(typeFilter);

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
