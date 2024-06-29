<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Enregistrer un Jour </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <form action="{{ route('jours-save')}}" method="POST">

                    @csrf

                    <div class="modal-body">
                        <label for="libelleJours" class-form="label"> Libelle Jours </label>
                        <input type="text" name="libelleJours" class="form-control" id="libelleJours" placeholder=""
                            required>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                        <button type="submit" class="btn btn-primary"> Enregistrer </button>
                    </div>

                </form>
            </div>

        </div>

    </div>