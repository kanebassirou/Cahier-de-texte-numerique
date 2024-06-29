@extends('layouts.base')
@section('Titre,"Modifier un Module')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Modification d'un Module </h1>
    <a class = "btn btn-primary text-center"; href="{{route('modules.index')}}"> Liste Des Modules</a>
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

        <form action="{{ route ('modules-update',['id' => $module -> id ])}}" method="POST">

            @csrf
            @method("PUT")

            <div class = "mb-3"> 
            <label for="libelleModule" class-form="label"> Libelle Module </label>
            <input type="text" value="{{$module -> libelleModule}}" name="libelle" class="form-control" id="libelleModule" placeholder="">       
            </div>
            <button type="submit" class="btn btn-info"> Mettre à jour </button>

        </form>
    </div>
</div>
    
@endsection