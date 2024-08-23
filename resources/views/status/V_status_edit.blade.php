<div class="modal fade text-left" id="editModal{{ $status->id_status }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $status->id_status }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel{{ $status->id_status }}">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('status_update', $status->id_status) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_name">Status Name</label>
                        <input type="text" name="status_name" id="status_name" value="{{ $status->status_name }}" class="form-control status_name @error('status_name') is-invalid @enderror" placeholder="Status Name" autofocus>
                        @error('status_name')
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
