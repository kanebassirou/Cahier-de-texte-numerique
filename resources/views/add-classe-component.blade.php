@extends('layouts.guest')
@section('Titre,"Ajouter une classe')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1>Ajouter une classe </h1>
    <a class = "btn btn-warning" href="{{route('courses.index')}}"> Liste des classes </a>
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

        <form action="{{ route ('courses-save')}}" method="POST">

            @csrf

            <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Libelle Classe</label>
            <input type="text" name="libelle" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>

        </form>
    </div>
</div>
@endsection




