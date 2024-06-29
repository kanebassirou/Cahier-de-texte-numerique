<!-- resources/views/cahier-de-texte/index.blade.php -->

@extends('layouts.guest')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion des Cahiers de Texte</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cahiers de Texte</li>
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

                    <a href="{{ route('cahier-de-texte.create') }}" class="btn btn-sm btn-primary">
                        Ajouter un Cahier de Texte
                    </a>

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
                                <td>{{ $cahierTexte->heure }}</td>
                                <td>{{ $cahierTexte->jour }}</td>
                                <td>{{ $cahierTexte->created_at }}</td>

                                <td class="d-flex justify-content-between pt-4">

                                    <a href="{{ route('cahier-de-texte.edit', $cahierTexte->id) }}"
                                        class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('cahier-de-texte.destroy', $cahierTexte->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

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
    </section>
    <!-- /.content -->
@endsection
