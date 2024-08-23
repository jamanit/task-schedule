<div class="modal fade text-left" id="editModal{{ $module->id_module }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $module->id_module }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel{{ $module->id_module }}">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('module_update', $module->id_module) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="module_name">Module Name</label>
                        <input type="text" name="module_name" id="module_name" value="{{ $module->module_name }}" class="form-control module_name @error('module_name') is-invalid @enderror" placeholder="Module Name" autofocus>
                        @error('module_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
