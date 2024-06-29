@extends('layouts.guest')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Gestion des Professeurs </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Profs </li>
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

                <h3 class="card-title"> Profs </h3>

                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                    Ajouter un Professeur
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
                        <th> Nom Complet</th>
                        <th> Email </th>
                        <th> Téléphone </th>
                        <th> Date de Création </th>
                        <th > Actions </th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($profs as $prof)

                        <tr>
                            <td>
                                {{ $prof->id }}
                            </td>
                            <td>
                                {{ $prof->name }}
                            </td>
                            <td>
                                {{ $prof->email}}
                            </td>
                            <td>
                                {{ $prof->phone }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($prof->created_ad)->format('d/m/Y h:m:s')}}
                            </td>

                            <td class="d-flex justify-content-between pt-4">
                                
                                <a href="{{route('professeur.module',['id' =>$prof->id])}}" title ="Affecter un module à un prof" class="btn btn-sm btn-dark" mr-2 > affectation </a>
                                <button class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#edit-modal{{ $prof->id }}">
                                    <i class="fas fa-pencil-alt"></i> </button>

                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal{{ $prof->id }}"> 
                                    <i class="fas fa-trash"></i> </button>

                            </td>
                        </tr>

                        {{--  @include('Parametrage.Etudiant.action', ['user' => $user])--}}

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
               {{-- {{ $profs->links() }} --}}
            </ul>
        </div>
    </div>
    <!-- /.card -->
    {{-- Add Modal --}}
    {{--  @include('Parametrage.Etudiant.modal') --}}
    {{-- End Add Modal --}}
</section>  
<!-- /.content -->

@endsection
