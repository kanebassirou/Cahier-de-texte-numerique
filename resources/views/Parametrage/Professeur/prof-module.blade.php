@extends('layouts.guest')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Modules affectés à {{ $prof->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard </a></li>
                        <li class="breadcrumb-item active"> Modules-affectation </li>
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
                        Ajouter une affectation
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
                            <th>#id</th>
                            <th>Module</th>
                            <th>Classe</th>
                            <th>Quantum</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($affectations as $affectation)
                            <tr>
                                <td>{{ $affectation->id }}</td>
                                <td>{{ $affectation->module->libelleModule }}</td>
                                <td>{{ $affectation->classe->libelleClasse }}</td>
                                <td>{{ $affectation->quantum }}</td>
                                <td>
                                    {{-- Ajoutez ici les boutons d'action si nécessaire --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{-- {{ $modules->links() }} --}}
                </ul>
            </div>
        </div>

        {{-- Add Modals --}}
        @include('Parametrage.Professeur.modal-affectation')
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
                    "buttons": ["copy", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
@endsection
