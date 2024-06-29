@push('styles')
    <style>
        .cursor {
            cursor: pointer;
        }
    </style>
@endpush

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">

        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CahierTexteNum</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image cursor" data-toggle="modal" data-target="#edit-profile">
                @if (Auth::user()->profile_picture == null)
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User">
                @else
                    {{-- {{ asset('storage/profile/' . Auth::user()->profile_picture) }} --}}
                    <img src="{{ asset('storage/profile/' . Auth::user()->profile_picture) }}"
                        class="img-circle elevation-2" alt="User">
                @endif


            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <!--fin dashboard-->

                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Etudiants
                        </p>
                    </a>
                </li>
                <!--fin Etudiants-->

                <li class="nav-item">
                    <a href="{{ route('professeur.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Professeurs
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Paramétrage
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link">
                                <i class="far fa-building nav-icon"></i>
                                <p> Classes </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modules.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Modules </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jours.index') }}" class="nav-link">
                                <i class="far fa-calendar nav-icon"></i>
                                <p> Jours </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-header"> Cours </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cahier-de-texte.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Cahier de texte</span>
                    </a>
                </li>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="edit-profile" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Modifier mon profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <label for="" class-form="label"> Image Profil </label>
                    <input type="file" name="file" class="form-control" id="" placeholder="" required>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary"> Enregistrer </button>
                </div>

            </form>
        </div>

    </div>

</div>
