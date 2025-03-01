<?php
// Imposta un timeout maggiore se necessario (in secondi)
set_time_limit(0);

// URL dell'API per ottenere la lista di tutti i Pokémon
$listUrl = "https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0";

// Recupera la lista dei Pokémon
$listJson = file_get_contents($listUrl);
if ($listJson === false) {
    die("Errore durante il recupero dei dati dalla lista API.");
}

$listData = json_decode($listJson, true);
if ($listData === null) {
    die("Errore durante la decodifica dei dati JSON della lista.");
}

// Estrai l'array dei risultati
$pokemonResults = $listData['results'];

$pokemonList = [];

// Itera su ciascun Pokémon per ottenere i dettagli
foreach ($pokemonResults as $index => $p) {
    $pokemonUrl = $p['url'];
    // Recupera i dettagli del Pokémon
    $detailJson = @file_get_contents($pokemonUrl);
    if ($detailJson === false) {
        echo "Impossibile recuperare i dettagli per: {$p['name']}\n";
        continue;
    }
    
    $detailData = json_decode($detailJson, true);
    if ($detailData === null) {
        echo "Errore nel decodificare i dettagli per: {$p['name']}\n";
        continue;
    }
    
    // Estrai nome, tipi e immagine
    $nome = $detailData['name'];
    
    $tipi = [];
    if (isset($detailData['types']) && is_array($detailData['types'])) {
        foreach ($detailData['types'] as $t) {
            $tipi[] = $t['type']['name'];
        }
    }
    
    // L'immagine usata è quella front_default
    $immagine = isset($detailData['sprites']['front_default']) ? $detailData['sprites']['front_default'] : null;
    
    $pokemonList[] = [
        "nome"     => $nome,
        "tipo"     => $tipi,
        "immagine" => $immagine
    ];
    
    // (Opzionale) Mostra l'avanzamento
    echo "Elaborato: {$nome} (" . ($index + 1) . "/" . count($pokemonResults) . ")\n";
}

// Prepara l'array finale
$output = ["pokemon" => $pokemonList];

// Codifica l'array in JSON in formato leggibile
$outputJson = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
if ($outputJson === false) {
    die("Errore durante la codifica dei dati in JSON.");
}

// Salva il file JSON nella stessa cartella dello script
$fileName = "pokemon.json";
if (file_put_contents($fileName, $outputJson) === false) {
    die("Errore nel salvataggio del file JSON.");
}

echo "\nFile {$fileName} creato con successo!";
?>
