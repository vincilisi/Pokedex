<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-fuoco">
    @include('components.nav')
  <h1 class="text-center my-4">Carte Pokémon</h1>

@include('components.formfiltri')

<div class="container text-center">
    <div class="row" id="pokemon-list">
        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            @if (isset($pokemons))
                @foreach($pokemons as $pokemon)
                    @if(isset($pokemon['name']))
                        <div class="col-md-2 mb-2 pokemon-card" data-name="{{ $pokemon['name'] }}" data-types="{{ implode(' ', $pokemon['tipo']) }}">
                            <div class="card">
                                @if(isset($pokemon['immagine']))
                                    <img src="{{ $pokemon['immagine'] }}" class="card-img-top" alt="{{ $pokemon['name'] }}">
                                @else
                                    <p>Immagine non disponibile per {{ $pokemon['name'] }}</p>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pokemon['name'] }}</h5>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning">
                                Pokémon senza nome rilevato.
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-warning">
                        Nessun Pokémon trovato.
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

<!-- Includi il file JavaScript per la ricerca -->
<script src="{{ asset('js/pokemon.js') }}"></script>
<script src="{{asset('js/icons.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
