
    <!-- Form per i filtri -->
    <div class="container mb-2">
        <form id="filter-form">
            <div class="row justify-content-between">
                <div class="col-md-4 mb-2">
                    <input type="text" id="name-filter" class="form-control" placeholder="Cerca per nome">
                </div>
                <div class="col-md-4 mb-2">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle w-100" type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Seleziona Tipo
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="typeDropdown" id="type-dropdown-menu">
                            <!-- Le opzioni verranno aggiunte dinamicamente -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <button type="button" id="sort-button" class="btn btn-light w-100">Ordina Alfabeticamente</button>
                </div>
            </div>
        </form>
    </div>