@extends('layouts.base')
@section('Titre,"Ajouter un Module')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1>Ajouter un module </h1>
    <a class = "btn btn-primary text-center"; href="{{route('modules.index')}}"> Liste des Modules </a>
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

        <form action="{{ route ('modules-save')}}" method="POST">

            @csrf

            <div class = "mb-3"> 
            <label for="LibelleModule" class-form="label"> Libelle Modules </label>
            <input type="text" name="libelleModule" class="form-control" id="libelleModule" placeholder="">       
            </div>
            <button type="submit" class="btn btn-primary"> Enregistrer </button>

        </form>
    </div>
</div>
    
@endsection