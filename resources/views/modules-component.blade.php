@extends('layouts.base')
@section('Titre,"Liste des modules')
@section('content')

<div class="d-flex justify-content-between pt-4">
    <h1>Liste des modules </h1>
    <a class="btn btn-secondary text-center" href="{{route('modules.add')}}"> Ajouter un Module </a>
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
                @forelse ($modules as $module)

                    <tr>
                        <td>
                            {{ $module->id }}
                        </td>

                        <td>
                            {{ $module->libelleModule }}
                        </td>

                        <td>
                            {{ $module->created_at }}
                        </td>

                        <td class="d-flex justify-content-between pt-4">

                            <a class="btn btn-sm btn-warning mr-4 float-right"
                                href="{{ route('courses-edit', ['id' => $classe->id]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{route('modules-delete', ['id' => $module->id])}}" method="POST">
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