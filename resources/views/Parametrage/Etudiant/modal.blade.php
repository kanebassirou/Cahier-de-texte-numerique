<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Enregistrer un nouvel Etudiant </h4>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            <form action="{{ route('user-save') }}" method="POST">

                @csrf
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label for="name"> Nom de l'étudiant </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"> Email de l'étudiant </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="adresse"> Adresse </label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>

                    <div class="form-group">
                        <label for="phone"> Téléphone </label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>

            </form>
        </div>
    </div>
</div>
