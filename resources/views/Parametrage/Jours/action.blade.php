<div class="modal fade" id="edit-modal{{$jour->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Modifier un Jour </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('jours-update', ['id' => $jour->id])}}" method="POST">

                @csrf
                @method("PUT")

                <div class="modal-body">
                    <label for="LibelleJours" class-form="label"> Libelle Jours </label>
                    <input type="text" value="{{$jour->libelleJours }}" name="libelle" class="form-control"
                        id="libelleJours" placeholder="" required>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary"> Mettre à jour </button>
                </div>

            </form>
        </div>

    </div>

</div>

<div class="modal fade" id="delete-modal{{$jour->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Suppression en cours ... </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">
                <p> Voulez Vous supprimer le jour <b>{{ $jour -> libelleJours}}</b> </p>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                <form action="{{route('jours-delete', ['id' => $jour->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> confirmer </button>
                </form>
            </div>


        </div>

    </div>

</div>