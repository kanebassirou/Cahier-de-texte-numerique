@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer Cahier de Texte</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cahier-de-texte.update', $cahierTexte->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cours">Cours</label>
                <input type="text" name="cours" id="cours" class="form-control" value="{{ $cahierTexte->cours }}">
            </div>

            <div class="form-group">
                <label for="heure">Heure</label>
                <input type="time" name="heure" id="heure" class="form-control" value="{{ $cahierTexte->heure }}">
            </div>

            <div class="form-group">
                <label for="jour">Jour</label>
                <input type="date" name="jour" id="jour" class="form-control" value="{{ $cahierTexte->jour }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
