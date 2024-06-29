@extends('layouts.guest')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Remplir le Cahier de text</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Rensigner le cahier de text</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">

                <div class="d-flex justify-content-between">

                    <h3 class="card-title">Cahiers de Texte</h3>

                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                        Ajouter un Cahier de Texte
                    </button>

                </div>

                <ul>
                    @foreach ($errors->all() as $message)
                        <li class="text-danger">{{ $message }}</li>
                    @endforeach
                </ul>


                @if (session()->has('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('danger'))
                    <div class="alert alert-danger mt-2">
                        {{ session('danger') }}
                    </div>
                @endif

            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>#id</th>
                            <th>Cours</th>
                            <th>Contenu du Cour</th>
                            <th>Heure</th>
                            <th>Jour</th>
                            <th>Date de Création</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($cahierTextes as $cahierTexte)
                            <tr>
                                <td>{{ $cahierTexte->id }}</td>
                                <td>{{ $cahierTexte->cours }}</td>
                                <td>{{ $cahierTexte->coutenuCour }}</td>
                                <td>{{ $cahierTexte->heure }}</td>
                                <td>{{ $cahierTexte->jour }}</td>
                                <td>{{ $cahierTexte->created_at }}</td>

                                <td class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#edit-modal{{ $cahierTexte->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete-modal{{ $cahierTexte->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('Parametrage.Cahier-text.action', ['cahierTexte' => $cahierTexte])


                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucune donnée n'est disponible</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $cahierTextes->links() }}
                </ul>
            </div>
        </div>
        <!-- /.card -->
        {{-- Add Modal --}}
        @include('Parametrage.Cahier-text.modal')
        {{-- End Add Modal --}}
    </section>
    <!-- /.content -->
@endsection
