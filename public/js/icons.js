document.addEventListener('DOMContentLoaded', function () {
    const selectElement = document.getElementById('type-filter');
    const optionsData = [

    ];

    // Aggiungi opzioni al select
    optionsData.forEach(optionData => {
        const option = document.createElement('option');
        const img = document.createElement('img');
        
        img.src = optionData.icon;

        // Aggiungi stile all'icona e bordo temporaneo per verificarne la visibilità
        img.style.width = '20px'; // Modifica la dimensione dell'icona
        img.style.height = '20px'; // Modifica l'altezza dell'icona
        img.style.verticalAlign = 'middle'; // Allinea verticalmente l'icona con il testo
        img.style.marginRight = '5px'; // Aggiungi uno spazio tra l'icona e il testo
        img.style.border = '2px dashed red'; // Aggiungi un bordo temporaneo per verificarne la visibilità
        img.style.borderRadius = '50%'; // Rendi l'icona circolare
        
        // Aggiungi un controllo per l'errore di caricamento dell'immagine
        img.onerror = function() {
            console.error('Errore nel caricamento dell\'immagine:', img.src);
        };

        img.onload = function() {
            console.log('Immagine caricata correttamente:', img.src);
        };
        
        option.value = optionData.value;
        option.innerHTML = img.outerHTML + ' ' + optionData.text;
        
        selectElement.appendChild(option);
    });
});
