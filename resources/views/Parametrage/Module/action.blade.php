<div class="modal fade" id="edit-modal{{$module->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Modifier un Module </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('modules-update', ['id' => $module->id])}}" method="POST">

                @csrf
                @method("PUT")

                <div class="modal-body">
                    <label for="LibelleModule" class-form="label"> Libelle Modules </label>
                    <input type="text" value="{{$module->libelleModule }}" name="libelle" class="form-control"
                        id="libelleModule" placeholder="" required>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary"> Mettre à jour </button>
                </div>

            </form>
        </div>

    </div>

</div>

<div class="modal fade" id="delete-modal{{$module->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Suppression en cours ... </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">
                <p> Voulez Vous supprimer la classe <b>{{ $module -> libelleModule}}</b> </p>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                <form action="{{route('modules-delete', ['id' => $module->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> confirmer </button>
                </form>
            </div>


        </div>

    </div>

</div>