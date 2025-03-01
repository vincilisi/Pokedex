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
function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    clearTimeout(countdownTimer);
    document.getElementById('countdown').style.display = 'none';
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
            logoutUser();
        }
    }, 1000);
}

// Funzione per effettuare il logout dell'utente
function logoutUser() {
    window.location.href = getLogoutUrl(); // Usa la funzione per ottenere l'URL di logout
}

// Eventi per resettare il timer di inattività
window.onload = resetInactivityTimer;
document.onmousemove = resetInactivityTimer;
document.onkeypress = resetInactivityTimer;
document.onclick = resetInactivityTimer; // Aggiungi questo evento per il clic del mouse
