<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrazione</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">
</head>
<body>
  <div class="container-fluid justify-content-center align-items-center mt-5">
    <div class="formsfondo">
      <h1 class="text-center">
        <a href="https://fontmeme.com/pokemon-font/">
          <img src="https://fontmeme.com/permalink/250224/30a640968c97eb269555cde702289537.png" alt="pokemon-font" border="0">
        </a>
      </h1>
      <form action="{{ route('register') }}" method="POST" class="container-fluid d-flex flex-column align-items-center p2">
        @csrf
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="name">Nome:</label>
          <input type="text" id="name" name="name" class="form-control form-control-sm small-input text-center" required>
        </div>
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="form-control form-control-sm small-input text-center" required>
        </div>
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="form-control form-control-sm small-input text-center" required>
        </div>
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="password_confirmation">Conferma Password:</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm small-input text-center" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">registrati</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
