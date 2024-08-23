<div class="modal fade text-left" id="editModal{{ $program->id_program }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $program->id_program }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel{{ $program->id_program }}">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('program_update', $program->id_program) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="program_name">Program Name</label>
                        <input type="text" name="program_name" id="program_name" value="{{ $program->program_name }}" class="form-control program_name @error('program_name') is-invalid @enderror" placeholder="Program Name" autofocus>
                        @error('program_name')
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
