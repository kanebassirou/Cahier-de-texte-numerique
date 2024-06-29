<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Enregistrer un Module </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('modules-enregistrer') }}" method="POST">

                @csrf

                <div class="modal-body">
                    <label for="LibelleModule" class-form="label"> Libelle Modules </label>
                    <input type="text" name="libelleModule" class="form-control" id="libelleModule" placeholder=""
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
