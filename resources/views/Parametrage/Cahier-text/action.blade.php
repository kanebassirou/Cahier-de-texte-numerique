<!-- Edit Modal -->
<div class="modal fade" id="edit-modal{{ $cahierTexte->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier un Cahier de Texte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('cahier-de-texte.update', ['cahier_de_texte' => $cahierTexte->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="cours" class="form-label">Cours</label>
                    <input type="text" value="{{ $cahierTexte->cours }}" name="cours" class="form-control"
                        id="cours" required>

                    <label for="heure" class="form-label mt-3">Heure</label>
                    <input type="time" value="{{ $cahierTexte->heure }}" name="heure" class="form-control"
                        id="heure" required>

                    <label for="jour" class="form-label mt-3">Jour</label>
                    <input type="date" value="{{ $cahierTexte->jour }}" name="jour" class="form-control"
                        id="jour" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete-modal{{ $cahierTexte->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression en cours...</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez-vous supprimer le cahier de texte pour le cours <b>{{ $cahierTexte->cours }}</b> ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <form action="{{ route('cahier-de-texte.destroy', ['cahier_de_texte' => $cahierTexte->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</div>
