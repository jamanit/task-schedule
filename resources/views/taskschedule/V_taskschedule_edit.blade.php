<div class="modal fade text-left" id="editModal{{ $taskschedule->id_taskschedule }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $taskschedule->id_taskschedule }}" aria-hidden="true">
    <form action="{{ route('taskschedule_update', $taskschedule->id_taskschedule) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel{{ $taskschedule->id_taskschedule }}">Edit Data</h4>
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
                                    @if ($taskschedule->image1)
                                        <a href="{{ asset('/assets/images/taskschedule/' . $taskschedule->image1) }}" target="_blank">
                                            <img src="{{ asset('/assets/images/taskschedule/' . $taskschedule->image1) }}" alt="" class="img-thumbnail preview_image1">
                                        </a>
                                    @else
                                        <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image1">
                                    @endif
                                </a>
                                <input type="file" name="image1" id="image1" value="" class="form-control image1 @error('image1') is-invalid @enderror" accept="image/*" autofocus>
                                @error('image1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <a id="view_image2" target="blank">
                                    @if ($taskschedule->image2)
                                        <a href="{{ asset('/assets/images/taskschedule/' . $taskschedule->image2) }}" target="_blank">
                                            <img src="{{ asset('/assets/images/taskschedule/' . $taskschedule->image2) }}" alt="" class="img-thumbnail preview_image2">
                                        </a>
                                    @else
                                        <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image2">
                                    @endif
                                </a>
                                <input type="file" name="image2" id="image2" value="" class="form-control image2" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <a id="view_image3" target="blank">
                                    @if ($taskschedule->image3)
                                        <a href="{{ asset('/assets/images/taskschedule/' . $taskschedule->image3) }}" target="_blank">
                                            <img src="{{ asset('/assets/images/taskschedule/' . $taskschedule->image3) }}" alt="" class="img-thumbnail preview_image3">
                                        </a>
                                    @else
                                        <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image3">
                                    @endif
                                </a>
                                <input type="file" name="image3" id="image3" value="" class="form-control image3" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="image4">Image 4</label>
                                <a id="view_image4" target="blank">
                                    @if ($taskschedule->image4)
                                        <a href="{{ asset('/assets/images/taskschedule/' . $taskschedule->image4) }}" target="_blank">
                                            <img src="{{ asset('/assets/images/taskschedule/' . $taskschedule->image4) }}" alt="" class="img-thumbnail preview_image4">
                                        </a>
                                    @else
                                        <img src="{{ asset('/assets/images/taskschedule/default-image.jpg') }}" alt="" class="img-thumbnail preview_image4">
                                    @endif
                                </a>
                                <input type="file" name="image4" id="image4" value="" class="form-control image4" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_program">Program Name</label>
                                <select name="id_program" id="id_program" class="form-control id_program @error('id_program') is-invalid @enderror" autofocus>
                                    <option value="">- select -</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id_program }}" {{ $program->id_program == $taskschedule->id_program ? 'selected' : '' }}>{{ $program->program_name }}</option>
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
                                        <option value="{{ $module->id_module }}" {{ $module->id_module == $taskschedule->id_module ? 'selected' : '' }}>{{ $module->module_name }}</option>
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
                                <input type="date" name="deadline" id="deadline" value="{{ $taskschedule->deadline }}" class="form-control deadline @error('deadline') is-invalid @enderror">
                                @error('deadline')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if (Auth::user()->level->id_level == 1)
                                <div class="form-group">
                                    <label for="id_user">Staf Name</label>
                                    <select name="id_user" id="id_user" class="form-control id_user @error('id_user') is-invalid @enderror" autofocus>
                                        <option value="">- select -</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id_user }}" {{ $user->id_user == $taskschedule->id_user ? 'selected' : '' }}>{{ $user->name }}</option>
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
                                <textarea name="description" id="description" class="form-control description @error('description') is-invalid @enderror" cols="30" rows="5" placeholder="Description">{{ $taskschedule->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_model">Change Model</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_model" id="change_model" value="1" class="change_model" {{ $taskschedule->change_model == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_model" id="desc_model" value="{{ $taskschedule->desc_model }}" class="form-control desc_model @error('desc_model') is-invalid @enderror" placeholder="Desc Model">
                                </div>
                                @error('desc_model')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_controller">Change Controller</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_controller" id="change_controller" value="1" class="change_controller" {{ $taskschedule->change_controller == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_controller" id="desc_controller" value="{{ $taskschedule->desc_controller }}" class="form-control desc_controller @error('desc_controller') is-invalid @enderror" placeholder="Desc Controller">
                                </div>
                                @error('desc_controller')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_view">Change View</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_view" id="change_view" value="1" class="change_view" {{ $taskschedule->change_view == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_view" id="desc_view" value="{{ $taskschedule->desc_view }}" class="form-control desc_view @error('desc_view') is-invalid @enderror" placeholder="Desc View">
                                </div>
                                @error('desc_view')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_database">Change Database</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_database" id="change_database" value="1" class="change_database" {{ $taskschedule->change_database == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_database" id="desc_database" value="{{ $taskschedule->desc_database }}" class="form-control desc_database @error('desc_database') is-invalid @enderror" placeholder="Desc Database">
                                </div>
                                @error('desc_database')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_assets">Change Assets</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_assets" id="change_assets" value="1" class="change_assets" {{ $taskschedule->change_assets == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_assets" id="desc_assets" value="{{ $taskschedule->desc_assets }}" class="form-control desc_assets @error('desc_assets') is-invalid @enderror" placeholder="Desc Assets">
                                </div>
                                @error('desc_assets')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="change_others">Change Others</label>
                                <div class="d-flex">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="change_others" id="change_others" value="1" class="change_others" {{ $taskschedule->change_others == 1 ? 'checked' : '' }}>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="desc_others" id="desc_others" value="{{ $taskschedule->desc_others }}" class="form-control desc_others @error('desc_others') is-invalid @enderror" placeholder="Desc Others">
                                </div>
                                @error('desc_others')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_status">Status Name</label>
                                <select name="id_status" id="id_status" class="form-control id_status @error('id_status') is-invalid @enderror">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id_status }}" {{ $status->id_status == $taskschedule->id_status ? 'selected' : '' }}>{{ $status->status_name }}</option>
                                    @endforeach
                                </select>
                                @error('id_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
