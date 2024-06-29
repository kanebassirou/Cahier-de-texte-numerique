@extends('layouts.base')
@section('Titre', 'Ajouter un Cahier de Texte')
@section('content')

    <div class="d-flex justify-content-between pt-4">
        <h1>Ajouter un Cahier de Texte</h1>
        <a class="btn btn-primary text-center" href="{{ route('cahier-de-texte.index') }}">Liste des Cahiers de Texte</a>
    </div>

    <div class="row py-3 px-3">
        <div class="col-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cahier-de-texte.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="cours" class="label">Cours</label>
                    <input type="text" name="cours" class="form-control" id="cours" placeholder="Cours" required>
                </div>
                <div class="mb-3">
                    <label for="cours" class="label">Contenu du Cour</label>
                    <input type="text" name="coutenuCour" class="form-control" id="coutenuCour" placeholder="contenuCour"
                        required>
                </div>

                <div class="mb-3">
                    <label for="heure" class="label">Heure</label>
                    <input type="time" name="heure" class="form-control" id="heure" placeholder="Heure" required>
                </div>

                <div class="mb-3">
                    <label for="jour" class="label">Jour</label>
                    <input type="date" name="jour" class="form-control" id="jour" placeholder="Jour" required>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>

@endsection
