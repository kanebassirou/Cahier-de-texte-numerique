<div class="modal fade" id="edit-modal{{ $user->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Modifier un Étudiant </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('user-update', ['id' => $user->id]) }}" method="POST">

                @csrf
                @method("PUT")

                <div class="modal-body">
                    <label for="name" class="form-label"> Nom </label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name" required>

                    <label for="adresse" class="form-label mt-3">Adresse</label>
                    <input type="text" value="{{ $user->adresse }}" name="adresse" class="form-control" id="adresse" required>

                    <label for="phone" class="form-label mt-3">Téléphone</label>
                    <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" id="phone" required>

                    <label for="etatEtudiant" class="form-label mt-3">État Étudiant</label>
                    <input type="text" value="{{ $user->etatEtudiant }}" name="etatEtudiant" class="form-control" id="etatEtudiant" required>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-modal{{ $user->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression en cours...</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <p> Voulez-vous supprimer l'étudiant <b>{{ $user->name }}</b> ?</p>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <form action="{{ route('user-delete', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </form>
            </div>

        </div>
    </div>
</div>
