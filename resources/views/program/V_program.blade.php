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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal"><i class="feather icon-plus"></i>&nbsp; Add New</button>
                                    @include('program.V_program_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Program Name</th>
                                                        <th>Times</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($programs as $program)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="text-nowrap align-top">
                                                                {{ $program->program_name }}
                                                            </td>
                                                            <td class="text-nowrap align-top">
                                                                <div>Created: {{ $program->created_at }} {{ $program->created_by ? '(' . $program->created_by . ')' : '' }}</div>
                                                                <div>Updated: {{ $program->updated_at }} {{ $program->updated_by ? '(' . $program->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $program->id_program }}"><i class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletetModal{{ $program->id_program }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('program.V_program_edit')
                                                            @include('program.V_program_delete')
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
@endsection

@section('script')
@endsection
