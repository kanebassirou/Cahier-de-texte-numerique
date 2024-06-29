<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('cahier-de-texte.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Cahier de Texte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cours">Cours</label>
                        <input type="text" class="form-control" id="cours" name="cours"
                            placeholder="Nom du cours" required>
                    </div>
                    <div class="form-group">
                        <label for="coutenuCour">Contenu cour</label>
                        <input type="text" class="form-control" id="coutenuCour" name="coutenuCour"
                            placeholder="Contenu du cour" required>
                    </div>
                    <div class="form-group">
                        <label for="heure">Heure</label>
                        <input type="time" class="form-control" id="heure" name="heure" required>
                    </div>
                    <div class="form-group">
                        <label for="jour">Jour</label>
                        <input type="date" class="form-control" id="jour" name="jour" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
