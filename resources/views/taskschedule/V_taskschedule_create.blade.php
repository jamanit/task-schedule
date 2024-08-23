<form action="{{ route('taskschedule_store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                <a id="view_image1" target="blank">
                                    <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image1">
                                </a>
                                <input type="file" name="image1" id="image1" value="{{ old('image1') }}" class="form-control image1 @error('image1') is-invalid @enderror" accept="image/*" autofocus>
                                @error('image1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <a id="view_image2" target="blank">
                                    <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image2">
                                </a>
                                <input type="file" name="image2" id="image2" value="{{ old('image2') }}" class="form-control image2" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <a id="view_image3" target="blank">
                                    <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image3">
                                </a>
                                <input type="file" name="image3" id="image3" value="{{ old('image3') }}" class="form-control image3" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image4">Image 4</label>
                                <a id="view_image4" target="blank">
                                    <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image4">
                                </a>
                                <input type="file" name="image4" id="image4" value="{{ old('image4') }}" class="form-control image4" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_program">Program Name</label>
                                <select name="id_program" id="id_program" class="form-control id_program select2 @error('id_program') is-invalid @enderror">
                                    <option value="">- select -</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id_program }}" {{ $program->id_program == old('id_program') ? 'selected' : '' }}>{{ $program->program_name }}</option>
                                    @endforeach
                                </select>
                                @error('id_program')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_module">Module Name</label>
                                <select name="id_module" id="id_module" class="form-control id_module @error('id_module') is-invalid @enderror">
                                    <option value="">- select -</option>
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->id_module }}" {{ $module->id_module == old('id_module') ? 'selected' : '' }}>{{ $module->module_name }}</option>
                                    @endforeach
                                </select>
                                @error('id_module')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="date" name="deadline" id="deadline" value="{{ old('deadline') ? old('deadline') : now()->addWeek()->format('Y-m-d') }}" class="form-control deadline @error('deadline') is-invalid @enderror">
                                @error('deadline')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if (Auth::user()->level->id_level == 1)
                                <div class="form-group">
                                    <label for="id_user">Staf Name</label>
                                    <select name="id_user" id="id_user" class="form-control id_user @error('id_user') is-invalid @enderror">
                                        <option value="">- select -</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id_user }}" {{ $user->id_user == old('id_user') ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_user')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control description @error('description') is-invalid @enderror" cols="30" rows="5" placeholder="Description">{{ old('change_model') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
