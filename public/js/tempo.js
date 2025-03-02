// Tempo massimo di inattività in millisecondi (15 minuti = 180000 ms)
var maxInactivityTime = 10000;

// Tempo di countdown in millisecondi (5 secondi)
var countdownTime = 5000;

// Variabili per tenere traccia dei timer
var inactivityTimer;
var countdownTimer;

// Funzione per ottenere l'URL di logout dall'attributo data
function getLogoutUrl() {
    return document.body.getAttribute('data-logout-url');
}

// Funzione per resettare il timer di inattività
// Funzione per resettare il timer di inattività
function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    clearTimeout(countdownTimer);

    var countdownElement = document.getElementById('countdown');
    if (countdownElement) {
        countdownElement.style.display = 'none';
    } else {
        console.warn("Elemento 'countdown' non trovato nel DOM");
    }
    
    // Aggiungi qui l'operazione sull'elemento
    var element = document.getElementById("idElemento"); // Cambia "idElemento" con l'ID effettivo del tuo elemento
    if (element) {
        // Esegui le operazioni sull'elemento
        element.style.someProperty = "someValue"; // Cambia "someProperty" e "someValue" con le proprietà e i valori effettivi
    } else {
        console.warn("Elemento non trovato nel DOM");
    }

    inactivityTimer = setTimeout(startCountdown, maxInactivityTime - countdownTime);
}


// Funzione per avviare il countdown
function startCountdown() {
    var countdownElement = document.getElementById('countdown');
    countdownElement.style.display = 'block';
    var timeLeft = 5; // secondi
    countdownElement.innerText = 'Logout tra ' + timeLeft + ' secondi';

    countdownTimer = setInterval(function() {
        timeLeft--;
        countdownElement.innerText = 'Logout tra ' + timeLeft + ' secondi';
        if (timeLeft <= 0) {
            clearInterval(countdownTimer);
            redirectTo404(); // Cambia questa funzione
        }
    }, 1000);
}

// Funzione per reindirizzare alla pagina 404
function redirectTo404() {
    window.location.href = '/404'; // Assumi che tu abbia una pagina 404 configurata
}

// Funzione per effettuare il logout dell'utente
function logoutUser() {
    var logoutUrl = getLogoutUrl();
    if (window.location.href.endsWith('/404')) {
        alert('Sessione scaduta. Ricarica la pagina per effettuare il login.');
        window.location.href = logoutUrl; // Reindirizza al login
    }
}

// Eventi per resettare il timer di inattività
window.onload = resetInactivityTimer;
document.onmousemove = resetInactivityTimer;
document.onkeypress = resetInactivityTimer;
document.onclick = resetInactivityTimer; // Aggiungi questo evento per il clic del mouse
