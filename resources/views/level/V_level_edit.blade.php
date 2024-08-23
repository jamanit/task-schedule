<div class="modal fade text-left" id="editModal{{ $level->id_level }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $level->id_level }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel{{ $level->id_level }}">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('level_update', $level->id_level) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="level_name">Level Name</label>
                        <input type="text" name="level_name" id="level_name" value="{{ $level->level_name }}" class="form-control level_name @error('level_name') is-invalid @enderror" placeholder="Level Name" autofocus>
                        @error('level_name')
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
