@extends('layouts.base')
@section('Titre,"Modifier un Jour')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Modification d'un Jour </h1>
    <a class = "btn btn-primary text-center"; href="{{route('jours.index')}}"> Liste Des Jours Ouvrables </a>
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

        <form action="{{ route ('jours-update',['id' => $jours -> id ])}}" method="POST">

            @csrf
            @method("PUT")

            <div class = "mb-3"> 
            <label for="libelleJours" class-form="label"> Libelle Jours </label>
            <input type="text" value="{{$jours -> libelleJours}}" name="libelle" class="form-control" id="libelleJours" placeholder="">       
            </div>
            <button type="submit" class="btn btn-info"> Mettre à jour </button>

        </form>
    </div>
</div>
    
@endsection