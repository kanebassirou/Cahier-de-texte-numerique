@extends('layouts.guest')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Gestion des Jours </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route("home")}}"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Jours </li>
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

                <h3 class="card-title"> Jours </h3>

                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                    Ajouter un Jour
                </button>

            </div>

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

        </div>
        <div class="card-body">
            <table class="table table-bordered">
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


                                <button class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#edit-modal{{$jour ->id }}">
                                    <i class="fas fa-pencil-alt"></i> </button>

                                <button  class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#delete-modal{{$jour ->id }}"> <i class="fas fa-trash"></i> </button>

                            </td>
                        </tr>

                        @include('Parametrage.Jours.action')

                    @empty
                        <tr>
                            <td colspan="4" class="text-center"> Aucune donnée n'est disponible </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $jours->links()}}
            </ul>
        </div>
    </div>
    <!-- /.card -->
    {{-- Add Modals--}}
    @include('Parametrage.Jours.modal')
    {{-- End Add Modal--}}
</section>
<!-- /.content -->

@endsection