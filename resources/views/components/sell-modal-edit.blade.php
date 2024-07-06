@extends('layouts.admin')

@section('title')
    Manajemen Store || Admin
@endsection

@section('store')
    active
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('components.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class="card mb-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <h5 class="card-header">Update Data</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row justify-content-center" id="productsContainer">
                                            <form enctype="multipart/form-data" method="post" action="{{ route('store.update', $query->id)}}">
                                                @csrf
                                                @method('PUT')
                                                @foreach ($columnsSubset as $column)
                                                    @if ($column === 'gambar')
                                                        <div class="mb-3">
                                                            <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                                            <img src="{{ asset('storage/'.$query->gambar)}}" class="img-thumbnail mb-2" id="existing_{{ $column }}" alt="Existing Image" height="100" width="250">
                                                            <input type="file" class="form-control" id="{{ $column }}" name="{{ $column }}">
                                                            <input type="hidden" name="existing_{{ $column }}" value="{{ $query->gambar }}">
                                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                                                        </div>
                                                    @elseif ($column === 'deskripsi')
                                                        <div class="mb-3">
                                                            <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                                            <textarea class="form-control" id="{{ $column }}" name="{{ $column }}" rows="4" required>{{ $query->$column }}</textarea>
                                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                                                        </div>
                                                    @else
                                                        <div class="mb-3">
                                                            <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                                            <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" value="{{ $query->$column }}" required>
                                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-6 mx-auto">
                                                            <a href="/admin/store" class="btn btn-secondary">Back</a>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('components.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->
@endsection
