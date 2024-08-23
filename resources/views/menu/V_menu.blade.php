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

                    {{-- firstmenu --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">First Menu</h4>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#firstmenu_createModal"><i class="feather icon-plus"></i>&nbsp; Add First Menu</button>
                                    @include('menu.V_menu_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>First Menu Name</th>
                                                        <th>First Menu Link</th>
                                                        <th>First Menu Icon</th>
                                                        <th>Created & Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($firstmenus as $firstmenu)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_link }}</td>
                                                            <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_icon }}</td>
                                                            <td class="text-nowrap align-top">
                                                                <div>Created: {{ $firstmenu->created_at }} {{ $firstmenu->created_by ? '(' . $firstmenu->created_by . ')' : '' }}</div>
                                                                <div>Updated: {{ $firstmenu->updated_at }} {{ $firstmenu->updated_by ? '(' . $firstmenu->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#firstmenu_editModal{{ $firstmenu->id_firstmenu }}"><i class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#firstmenu_deletetModal{{ $firstmenu->id_firstmenu }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('menu.V_menu_edit')
                                                            @include('menu.V_menu_delete')
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

                    {{-- secondmenu --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Second Menu</h4>
                                    <button type="button" class="btn btn-primary btn_secondmenu" data-toggle="modal" data-target="#secondmenu_createModal"><i class="feather icon-plus"></i>&nbsp; Add Second Menu</button>
                                    @include('menu.V_menu_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>First Menu Name</th>
                                                        <th>Second Menu Name</th>
                                                        <th>Second Menu Link</th>
                                                        <th>Second Menu Icon</th>
                                                        <th>Created & Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($secondmenus as $secondmenu)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="text-nowrap align-top">{{ $secondmenu->firstmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_link }}</td>
                                                            <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_icon }}</td>
                                                            <td class="text-nowrap align-top">
                                                                <div>Created: {{ $secondmenu->created_at }} {{ $secondmenu->created_by ? '(' . $secondmenu->created_by . ')' : '' }}</div>
                                                                <div>Updated: {{ $secondmenu->updated_at }} {{ $secondmenu->updated_by ? '(' . $secondmenu->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning btn_secondmenu" data-id="{{ $secondmenu->id_firstmenu }}" data-toggle="modal" data-target="#secondmenu_editModal{{ $secondmenu->id_secondmenu }}"><i class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#secondmenu_deletetModal{{ $secondmenu->id_secondmenu }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('menu.V_menu_edit')
                                                            @include('menu.V_menu_delete')
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

                    {{-- thirdmenu --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Third Menu</h4>
                                    <button type="button" class="btn btn-primary btn_thirdmenu" data-toggle="modal" data-target="#thirdmenu_createModal"><i class="feather icon-plus"></i>&nbsp; Add Third Menu</button>
                                    @include('menu.V_menu_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Second Menu Name</th>
                                                        <th>Third Menu Name</th>
                                                        <th>Third Menu Link</th>
                                                        <th>Third Menu Icon</th>
                                                        <th>Times</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($thirdmenus as $thirdmenu)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="text-nowrap align-top">{{ $thirdmenu->secondmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_link }}</td>
                                                            <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_icon }}</td>
                                                            <td class="text-nowrap align-top">
                                                                <div>Created: {{ $thirdmenu->created_at }} {{ $thirdmenu->created_by ? '(' . $thirdmenu->created_by . ')' : '' }}</div>
                                                                <div>Updated: {{ $thirdmenu->updated_at }} {{ $thirdmenu->updated_by ? '(' . $thirdmenu->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning btn_thirdmenu" data-id="{{ $thirdmenu->id_secondmenu }}" data-toggle="modal" data-target="#thirdmenu_editModal{{ $thirdmenu->id_thirdmenu }}"><i class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#thirdmenu_deletetModal{{ $thirdmenu->id_thirdmenu }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('menu.V_menu_edit')
                                                            @include('menu.V_menu_delete')
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

                    {{-- thirdmenu --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Fourth Menu</h4>
                                    <button type="button" class="btn btn-primary btn_fourthmenu" data-toggle="modal" data-target="#fourthmenu_createModal"><i class="feather icon-plus"></i>&nbsp; Add Fourth Menu</button>
                                    @include('menu.V_menu_create')
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Third Menu Name</th>
                                                        <th>Fourth Menu Name</th>
                                                        <th>Fourth Menu Link</th>
                                                        <th>Fourth Menu Icon</th>
                                                        <th>Created & Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($fourthmenus as $fourthmenu)
                                                        <tr>
                                                            <td class="align-top">{{ $i++ }}</td>
                                                            <td class="text-nowrap align-top">{{ $fourthmenu->thirdmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_name }}</td>
                                                            <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_link }}</td>
                                                            <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_icon }}</td>
                                                            <td class="text-nowrap align-top">
                                                                <div>Created: {{ $fourthmenu->created_at }} {{ $fourthmenu->created_by ? '(' . $fourthmenu->created_by . ')' : '' }}</div>
                                                                <div>Updated: {{ $fourthmenu->updated_at }} {{ $fourthmenu->updated_by ? '(' . $fourthmenu->updated_by . ')' : '' }}</div>
                                                            </td>
                                                            <td class="align-top btn-group">
                                                                <button type="button" class="btn btn-warning btn_fourthmenu" data-id="{{ $fourthmenu->id_thirdmenu }}" data-toggle="modal" data-target="#fourthmenu_editModal{{ $fourthmenu->id_fourthmenu }}"><i
                                                                        class="feather icon-edit"></i></button>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fourthmenu_deletetModal{{ $fourthmenu->id_fourthmenu }}"><i class="feather icon-trash"></i></button>
                                                            </td>
                                                            @include('menu.V_menu_edit')
                                                            @include('menu.V_menu_delete')
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
    <script>
        $(document).ready(function() {
            $('.btn_secondmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_firstmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_firstmenu').empty();
                        $('.id_firstmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_firstmenu == buttonId) ? 'selected' : '';
                            $('.id_firstmenu').append('<option value="' + item.id_firstmenu + '" ' + selected + '>' + item.firstmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.btn_thirdmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_secondmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_secondmenu').empty();
                        $('.id_secondmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_secondmenu == buttonId) ? 'selected' : '';
                            $('.id_secondmenu').append('<option value="' + item.id_secondmenu + '" ' + selected + '>' + item.secondmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.btn_fourthmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_thirdmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_thirdmenu').empty();
                        $('.id_thirdmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_thirdmenu == buttonId) ? 'selected' : '';
                            $('.id_thirdmenu').append('<option value="' + item.id_thirdmenu + '" ' + selected + '>' + item.thirdmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
