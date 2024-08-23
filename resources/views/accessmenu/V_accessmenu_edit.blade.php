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
                                    <li class="breadcrumb-item"><a href="{{ url('/level') }}">Level</a>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <form action="{{ route('accessmenu_store', $level->id_level) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="card-header">
                                            <h3>{{ !empty($level) ? 'Level Name: ' . $level->level_name : '' }}</h3>
                                        </div>
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Menu</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach ($menus as $menu)
                                                            @php
                                                                $checked = '';
                                                                // Check apakah data menu ini sudah ada di tabel accessmenu
                                                                $accessmenu = App\Models\M_accessmenu::where('id_firstmenu', $menu->id_firstmenu)
                                                                    ->where('id_secondmenu', $menu->id_secondmenu)
                                                                    ->where('id_thirdmenu', $menu->id_thirdmenu)
                                                                    ->where('id_fourthmenu', $menu->id_fourthmenu)
                                                                    ->where('id_level', $level->id_level)
                                                                    ->first();
                                                                // Jika data sudah ada, set $checked menjadi 'checked'
                                                                if ($accessmenu) {
                                                                    $checked = 'checked';
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <input type="hidden" name="id_level[]" id="id_level" value="{{ $level->id_level }}">
                                                                <td>{{ $i++ }}</td>
                                                                <td><button type="button" class="btn btn-primary">{{ implode(' > ', array_filter([$menu->firstmenu_name, $menu->secondmenu_name, $menu->thirdmenu_name, $menu->fourthmenu_name])) }}</button></td>
                                                                <td>
                                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input type="checkbox" name="id_menu[]" id="id_menu" value="{{ $menu->id_firstmenu . ',' . $menu->id_secondmenu . ',' . $menu->id_thirdmenu . ',' . $menu->id_fourthmenu }}" {{ $checked }}>
                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="">Active</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
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
