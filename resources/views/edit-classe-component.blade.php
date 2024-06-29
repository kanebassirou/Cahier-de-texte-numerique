@extends('layouts.base')
@section('Titre,"Modifier une classe')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Modification d'un classe </h1>
    <a class = "btn btn-primary text-center"; href="{{route('courses.index')}}"> Liste Des Classes </a>
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

        <form action="{{ route ('courses-update',['id' => $classe -> id ])}}" method="POST">

            @csrf
            @method("PUT")

            <div class = "mb-3"> 
            <label for="libelleClasse" class-form="label"> Libelle Classe </label>
            <input type="text" value="{{$classe -> libelleClasse}}" name="libelle" class="form-control" id="libelleClasse" placeholder="">       
            </div>
            <button type="submit" class="btn btn-info"> Mettre à jour </button>

        </form>
    </div>
</div>
    
@endsection