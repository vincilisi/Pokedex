<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina non trovata</title>
    <style>
        body {
            background-image: url('/media/sfondo.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
  
    </style>
</head>
<body>
    <div class="container">
        <div class="alert">
            <h1>Pagina non trovata</h1>
            <p>La tua sessione è scaduta. Per favore, ricarica la pagina per effettuare il login.</p>
            <button onclick="redirectToLogin()">Ricarica la pagina</button>
        </div>
    </div>
    <script>
        function redirectToLogin() {
            window.location.href = '/login';
        }
    </script>
</body>
</html>
