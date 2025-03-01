<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NavBar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-fuoco">
    <div class="container-fluid custom">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100 mb-2 mb-lg-0">
          <li class="nav-item flex-grow-1">
            <a class="nav-link active fw-bold text-terra animated-element ms-3" aria-current="page" href="home">HomePage</a>
          </li>
          <li class="nav-item flex-grow-1">
            <a class="nav-link fw-bold text-terra animated-element" href="pokemon">Pokemon</a>
          </li>
          <li class="nav-item flex-grow-1">
            <a class="nav-link fw-bold text-terra animated-element" href="contat-us">Contatti</a>
          </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn text-terra fw-bold animated-element">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery 3.6.0 -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap 5 -->
  </body>
</html>