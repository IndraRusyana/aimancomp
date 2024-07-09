@extends('layouts.admin')

@section('title')
    Pekerjaan | Admin
@endsection

@section('pekerjaan')
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pekerjaan dan Penjualan /</span>
                            <div id="tableTitle" class="d-inline"> Services </div>
                        </h4>
                            <div class="card">
                                <h6 class="card-header">
                                    <ul id="dataType" class="nav nav-pills mb-3" role="tablist">
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobservices"}'>
                                            <a class="nav-link active" href="#" aria-selected="true">
                                                Service
                                            </a>
                                        </li>
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobspareparts"}'>
                                            <a class="nav-link" href="#" aria-selected="false">
                                                Penjualan Sparepart
                                            </a>
                                        </li>
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobprograms"}'>
                                            <a class="nav-link" href="#" aria-selected="false">
                                                Pembuatan aplikasi & web
                                            </a>
                                        </li>
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobjokis"}'>
                                            <a class="nav-link" href="#" aria-selected="false">
                                                Joki tugas, skripsi dan jurnal
                                            </a>
                                        </li>
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobtopups"}'>
                                            <a class="nav-link" href="#" aria-selected="false">
                                                Topup e-wallet & voucher kuota
                                            </a>
                                        </li>
                                        <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobminumans"}'>
                                            <a class="nav-link" href="#" aria-selected="false">
                                                Kopi & minuman
                                            </a>
                                        </li>
                                    </ul>
                                </h6>
                                <div class="table-responsive text-nowrap" id="table-content">
                                    <table class="table table-striped" id="dataTable">
                                        <thead id="tableHead">
                                            <tr>
                                                @foreach ($columnsSubset as $column)
                                                    <th>{{$column}}</th>
                                                @endforeach
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0" id="tableBody">
                                            @foreach ($query as $item)
                                                <tr id="index_{{ $item->id }}" data-id="{{ $item->id }}">
                                                    @foreach ($columnsSubset as $column)
                                                        @if (strtolower($column) === 'status')
                                                            @php
                                                                $statusClass = '';
                                                                if ($item->$column === 'selesai') {
                                                                    $statusClass = 'badge bg-label-success';
                                                                } elseif ($item->$column === 'proses') {
                                                                    $statusClass = 'badge bg-label-warning';
                                                                } elseif ($item->$column === 'pending') {
                                                                    $statusClass = 'badge bg-label-danger';
                                                                }
                                                            @endphp
                                                            <td>
                                                                <span class="{{ $statusClass }}">{{ $item->$column }}</span> 
                                                            </td>
                                                        @else
                                                            <td>{{ $item->$column }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="{{ $item->id }}">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a>
                                                                <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="{{ $item->id }}">
                                                                    <i class="bx bx-trash me-1"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="">
                                            <tr>
                                                <th colspan="5">
                                                    <a class="btn btn-outline-primary my-3" style="font-size:12px;"
                                                     href="#" id="addDataButton">
                                                        Tambah Data
                                                    </a>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
