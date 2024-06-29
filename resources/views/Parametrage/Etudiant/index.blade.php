@extends('layouts.guest')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Gestion des Etudiants </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Etudiants </li>
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

                <h3 class="card-title"> Etudiants </h3>

                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                    Ajouter un Etudiant
                </button>

            </div>
            
            <ul>
            @foreach ($errors->all() as $message) 
            <li class="text-danger">{{ $message }}</li>
            @endforeach
            </ul>
           

            @if(session()->has('success'))
                <div class="alert alert-success mt-2">
                    {{session('success')}}
                </div>
            @endif

            @if(session()->has('danger'))
                <div class="alert alert-danger mt-2">
                    {{session('danger')}}
                </div>
            @endif

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>

                    <tr>
                        <th> #id </th>
                        <th> Nom </th>
                        <th> Adresse </th>
                        <th> Téléphone </th>
                        <th> Rôle </th>
                        <th> Etat </th>
                        <th> Date de Création </th>
                        <th> Actions </th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($users as $user)

                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->adresse }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td>
                                {{ $user->etatEtudiant }}
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>

                            <td class="d-flex justify-content-between pt-4">

                                <button class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#edit-modal{{ $user->id }}">
                                    <i class="fas fa-pencil-alt"></i> </button>

                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal{{ $user->id }}"> 
                                    <i class="fas fa-trash"></i> </button>

                            </td>
                        </tr>

                        @include('Parametrage.Etudiant.action', ['user' => $user])

                    @empty
                        <tr>
                            <td colspan="8" class="text-center"> Aucune donnée n'est disponible </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $users->links() }}
            </ul>
        </div>
    </div>
    <!-- /.card -->
    {{-- Add Modal --}}
    @include('Parametrage.Etudiant.modal')
    {{-- End Add Modal --}}
</section>
<!-- /.content -->

@endsection
