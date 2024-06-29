@extends('layouts.guest')
@section('Titre', 'Gestion des classes')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1> Gestion des Classes </h1>
            </div>
            <div class="col-sm-8">
                <ol class="breadcrumb float-sm-right text-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Classe</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="row">
        <!-- Colonne de 4 pour Ajouter une classe -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('courses-save') }}" method="POST">
                        @csrf
                        <h2 class="custom-card-title">Ajouter une classe</h2>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé de la classe</label>
                            <input type="text" name="libelle" class="form-control" id="libelle" aria-describedby="libelleHelp">
                        </div>
                        <button type="submit" class="btn btn-primary btn-hover">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Colonne de 8 pour Liste des classes -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="custom-card-title"> Liste des classes</h2>

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session()->has('danger'))
                        <div class="alert alert-danger">{{ session('danger') }}</div>
                    @endif

                    <table class="table">

                        <thead>
                            <tr>
                                <th>#id</th>
                                <th>Libellé de la classe</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($classes as $classe)
                             <!-- #region -->
                                <tr>
                                    <td>{{ $classe->id }}</td>
                                    <td>{{ $classe->libelleClasse }}</td>
                                    <td>{{ $classe->created_at }}</td>
                                    <td class="d-flex justify-content-between pt-4">

                                        <a class="btn btn-sm btn-warning mr-4 float-right"
                                            href="{{ route('courses-edit', ['id' => $classe->id]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('courses-delete', ['id' => $classe->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-right">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Aucune donnée n'est disponible</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection