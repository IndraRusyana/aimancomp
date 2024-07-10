@extends('layouts.admin')

@section('title')
    Pengeluaran | Admin
@endsection

@section('pengeluaran')
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
                        <!-- Examples -->
                        <div class="row mb-5">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-header">
                                                List Pengeluaran
                                            </h5>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <a id="addDataOutcomeButton" href="#"
                                                class="btn btn-outline-secondary me-2">Tambah Data
                                            </a>
                                            <form id="pdfForm" action="{{ route('reportJob') }}" method="GET" target="_blank">
                                                <input type="hidden" name="job" id="jobInput" value="{{$title}}">
                                                <button type="submit" class="btn btn-outline-secondary me-2">Cetak Laporan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="table-responsive text-nowrap" id="table-content">
                                                <table class="table table-striped" id="dataTable">
                                                    <thead id="tableHead">
                                                        <tr>
                                                            @foreach ($columnsSubset as $column)
                                                                <th>{{ $column }}</th>
                                                            @endforeach
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="tableOutcomeBody">
                                                        @foreach ($query as $item)
                                                            <tr id="outcome_{{ $item->id }}" data-id="{{ $item->id }}">
                                                                @foreach ($columnsSubset as $column)
                                                                    <td>{{ $item->$column }}</td>
                                                                @endforeach
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item edit-outcome-button"
                                                                                href="javascript:void(0);"
                                                                                data-id="{{ $item->id }}">
                                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                                            </a>
                                                                            <a class="dropdown-item delete-outcome-button"
                                                                                href="javascript:void(0);"
                                                                                data-id="{{ $item->id }}">
                                                                                <i class="bx bx-trash me-1"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="row justify-content-center mt-5 mx-3">
                                                    {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Examples -->
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
