@extends('layouts.base')
@section('Titre', 'Ajouter un Étudiant')
@section('content')

    <div class="d-flex justify-content-between pt-4">
        <h1>Ajouter un étudiant</h1>
        <a class="btn btn-primary text-center" href="{{ route('user.index') }}">Liste des Étudiants</a>
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

            <form action="{{ route('user-save') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="label"> Nom de l'étudiant</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nom de l'étudiant"
                        required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="label">Téléphone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Téléphone"
                        required>
                </div>

                <div class="mb-3">
                    <label for="etatEtudiant" class="label">État Étudiant</label>
                    <div class="form-check">
                        <input type="checkbox" name="etatEtudiant" class="form-check-input" id="etatEtudiant"
                            value="0">
                        <label class="form-check-label" for="etatEtudiant">Actif</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>

@endsection
