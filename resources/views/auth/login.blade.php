<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 flex-column sfondo3">
      <h1 class="text-center ph">
        <a href="https://fontmeme.com/pokemon-font/">
          <img src="https://fontmeme.com/permalink/250225/e5c407656455f1370217c7a8d86c949a.png" alt="pokemon-font" border="0">
        </a>
      </h1>
      <form action="{{ route('login') }}" method="POST" class="container-fluid d-flex flex-column align-items-center p3">
        @csrf
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="form-control form-control-sm small-input text-center" required>
        </div>
        <div class="form-group d-flex justify-content-center w-50 mb-4">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="form-control form-control-sm small-input text-center" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Accedi</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
