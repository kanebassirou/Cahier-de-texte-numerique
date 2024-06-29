@extends('layouts.guest')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">v
    @endpush

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Gestion des Modules </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard </a></li>
                        <li class="breadcrumb-item active"> Modules </li>
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

                    <h3 class="card-title"> Modules </h3>

                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                        Ajouter un Module
                    </button>

                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success mn-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('danger'))
                    <div class="alert alert-danger mn-2">
                        {{ session('danger') }}
                    </div>
                @endif

            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered">
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


                                    <button class="btn btn-sm btn-warning mr-2" data-toggle="modal"
                                        data-target="#edit-modal{{ $module->id }}">
                                        <i class="fas fa-pencil-alt"></i> </button>

                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete-modal{{ $module->id }}"> <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>

                            @include('Parametrage.Module.action')

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
                    {{-- {{ $modules -> links()} --}}
                </ul>
            </div>
        </div>
        <!-- /.card -->
        {{-- Add Modals --}}
        @include('Parametrage.Module.modal')
        {{-- End Add Modal --}}
    </section>
    <!-- /.content -->

    @push('datatable')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    @endpush

    @push('scripts')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "excel", "pdf", "print", ]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
@endsection
