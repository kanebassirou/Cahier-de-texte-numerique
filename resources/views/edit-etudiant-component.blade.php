@extends('layouts.base')
@section('Titre', 'Modifier un étudiant ')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Modification d'un étudiant </h1>
    <a class="btn btn-primary text-center" href="{{ route('user.index') }}"> Liste Des Etudiants </a>
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

        <form action="{{ route('user-update', ['id' => $user->id]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name" required>

                <label for="adresse" class="form-label mt-3">Adresse</label>
                <input type="text" value="{{ $user->adresse }}" name="adresse" class="form-control" id="adresse" required>

                <label for="phone" class="form-label mt-3">Téléphone</label>
                <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" id="phone" required>

                <label for="etatEtudiant" class="form-label mt-3">État Étudiant</label>
                <input type="text" value="{{ $user->etatEtudiant }}" name="etatEtudiant" class="form-control" id="etatEtudiant" required>
            </div>

            <button type="submit" class="btn btn-info">Mettre à jour</button>

        </form>
    </div>
</div>

@endsection
