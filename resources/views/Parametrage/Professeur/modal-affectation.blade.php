<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Enregistrer une affectation </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('modules-save') }}" method="POST">

                @csrf

                <div class="modal-body">
                    <div class="mb-2">
                        <label for="classe" class-form="label"> classe </label>
                        <select name="classe" class="form-conrol" id="classe">
                            <option value="">-- Selectionner une Classe --</option>

                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->libelleClasse }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="quantum" class-form="label"> Quantum Horaire </label>
                        <input type="number" name="quantum" class="form-control" id="quantum" placeholder="quantum"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="module_id" class="label">Module</label>
                        <select name="module_id" class="form-control" id="module_id" required>
                            <option value="">-- Sélectionner un Module --</option>
                            @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->libelleModule }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary"> Enregistrer </button>
                </div>

            </form>
        </div>

    </div>

</div>
