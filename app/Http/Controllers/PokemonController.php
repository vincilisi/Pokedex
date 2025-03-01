<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PokemonController extends Controller
{
    public function index()
    {
        try {
            $jsonPath = public_path('data/pokemon.json');
            if (!File::exists($jsonPath)) {
                Log::error('File JSON non trovato nel percorso:', ['path' => $jsonPath]);
                throw new \Exception('File JSON non trovato.');
            }

            $pokemons = json_decode(File::get($jsonPath), true);
            if ($pokemons === null) {
                throw new \Exception('Errore nel decodificare il file JSON.');
            }

            // Usa Log::info per fare il debug dei dati
            Log::info('Struttura dei dati Pokémon:', $pokemons);

            // Verifica che $pokemons sia un array e che ogni elemento sia un array associativo
            if (is_array($pokemons) && array_filter($pokemons, 'is_array') === $pokemons) {
                return view('pokemon', compact('pokemons'));
            } else {
                throw new \Exception('I dati JSON non sono validi.');
            }
        } catch (\Exception $e) {
            // Gestisci l'errore in modo appropriato
            Log::error('Errore:', ['message' => $e->getMessage()]);
            return view('pokemon')->withErrors(['message' => $e->getMessage()]);
        }
    }
}
