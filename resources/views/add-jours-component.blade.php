@extends('layouts.base')
@section('Titre,"Ajouter un Jour')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Ajouter un Jour </h1>
    <a class = "btn btn-primary text-center"; href="{{route('jours.index')}}"> Liste des Jours </a>
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

        <form action="{{ route ('jours-save')}}" method="POST">

            @csrf

            <div class = "mb-3"> 
            <label for="LibelleJours" class-form="label"> Libelle Jours </label>
            <input type="text" name="libelleJours" class="form-control" id="libelleJours" placeholder="">       
            </div>
            <button type="submit" class="btn btn-primary"> Enregistrer </button>

        </form>
    </div>
</div>
    
@endsection