@extends('layouts.base')
@section('Titre,"Jours de Travail')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1> Jours Ouvrables </h1>
    <a class="btn btn-secondary text-center" href="{{route('jours.add')}}"> Ajouter un Jours </a>
</div>

<div class="row py-3 px-3">
    <div class="col-12">

        @if(session()->has('success'))
            <div class="alert alert-success mn-2">
                {{session('success')}}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="alert alert-danger mn-2">
                {{session('danger')}}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th> #id </th>
                    <th> Libelle </th>
                    <th> Date de Création</th>
                    <th> Actions </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($jours as $jour)

                    <tr>
                        <td>
                            {{ $jour->id }}
                        </td>

                        <td>
                            {{ $jour->libelleJours}}
                        </td>

                        <td>
                            {{ $jour->created_at }}
                        </td>

                        <td class="d-flex justify-content-between pt-4">

                            <a class="btn btn-sm btn-warning mr-4 float-right"
                                href="{{ route('jours-edit', ['id' => $jour->id]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{route('jours-delete', ['id' => $jour->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center"> Aucune donnée n'est disponible </td>
                    </tr>

                @endforelse  
            </tbody>
        </table>
    </div>
</div>
@endsection