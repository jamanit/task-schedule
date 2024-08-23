@extends('layouts.home.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ $title }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ $title }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    @if (session('success') || session('error'))
                        <div class="alert  alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                            <p class="mb-0">{{ session('success') ? session('success') : session('error') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#createModal"><i class="feather icon-plus"></i>&nbsp; Add New</button>
                                    @include('taskschedule.V_taskschedule_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <form action="{{ url('taskschedule') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="id_status">Status</label>
                                                            <select name="id_status" id="id_status" class="form-control">
                                                                <option value="">All</option>
                                                                @foreach ($statuses as $status)
                                                                    <option value="{{ $status->id_status }}" {{ old('id_status', session('id_status')) == $status->id_status ? 'selected' : '' }}>{{ $status->status_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="id_program">Program</label>
                                                            <select name="id_program" id="id_program" class="form-control">
                                                                <option value="">All</option>
                                                                @foreach ($programs as $program)
                                                                    <option value="{{ $program->id_program }}" {{ old('id_program', session('id_program')) == $program->id_program ? 'selected' : '' }}>{{ $program->program_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="id_module">Module</label>
                                                            <select name="id_module" id="id_module" class="form-control">
                                                                <option value="">All</option>
                                                                @foreach ($modules as $module)
                                                                    <option value="{{ $module->id_module }}" {{ old('id_module', session('id_module')) == $module->id_module ? 'selected' : '' }}>{{ $module->module_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="created_at">Created</label>
                                                            <input type="month" name="created_at" id="created_at" class="form-control" value="{{ old('created_at', session('created_at') ?? date('Y-m')) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for=""></label>
                                                    <button type="submit" class="btn btn-primary form-control">Get Data</button>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="table-responsive mt-1">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Primary Information</th>
                                                        <th>Other Information</th>
                                                        <th>Times</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($taskschedules as $taskschedule)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="align-top text-nowrap">
                                                                <div><span class="font-weight-bold">Program Name:</span> {{ $taskschedule->program->program_name }}</div>
                                                                <div><span class="font-weight-bold">Module Name:</span> {{ $taskschedule->module->module_name }}</div>
                                                                <div><span class="font-weight-bold">Staff Name:</span> {{ $taskschedule->user->name }}</div>
                                                                <div><span class="font-weight-bold">Status:</span>
                                                                    <button
                                                                        class="btn
                                                                    @if ($taskschedule->id_status == '1') btn-warning btn-sm
                                                                    @elseif ($taskschedule->id_status == '2') btn-success btn-sm
                                                                    @elseif ($taskschedule->id_status == '3') btn-danger btn-sm
                                                                    @else btn-secondary btn-sm @endif">
                                                                        {{ $taskschedule->status->status_name }}
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="align-top">
                                                                <div><span class="font-weight-bold">Description:</span> {{ $taskschedule->description }}</div>
                                                            </td>
                                                            <td class="text-nowrap align-top">
                                                                <div><span class="font-weight-bold">Deadline:</span> <span class="{{ $taskschedule->deadline < now() ? 'text-danger' : '' }}">{{ $taskschedule->deadline }}</span></div>
                                                                <div><span class="font-weight-bold">Created:</span> {{ $taskschedule->created_at }} {{ $taskschedule->created_by ? '(' . $taskschedule->created_by . ')' : '' }}</div>
                                                                <div><span class="font-weight-bold">Updated:</span> {{ $taskschedule->updated_at }} {{ $taskschedule->updated_by ? '(' . $taskschedule->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $taskschedule->id_taskschedule }}"><i class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletetModal{{ $taskschedule->id_taskschedule }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('taskschedule.V_taskschedule_edit')
                                                            @include('taskschedule.V_taskschedule_delete')
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .img-thumbnail {
            width: 100%;
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Function to display image preview
            function readURL(input, target) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(target).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            // Trigger the preview when an image input changes
            $('.image1').change(function() {
                readURL(this, '.preview_image1');
            });

            $('.image2').change(function() {
                readURL(this, '.preview_image2');
            });

            $('.image3').change(function() {
                readURL(this, '.preview_image3');
            });

            $('.image4').change(function() {
                readURL(this, '.preview_image4');
            });
        });
    </script>
@endsection
