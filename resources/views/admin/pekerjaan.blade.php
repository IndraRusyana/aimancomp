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
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <h6 class="card-header">
                                        <div class="row mb-5">
                                            <div class="col-10">
                                                <h4 class="mt-3" id="laporanHeader"> 
                                                    Layanan Service
                                                </h4>
                                            </div>
                                            @if(auth()->user()->isInvestor() || auth()->user()->isOwner())
                                            <div class="col-2">
                                                <form id="pdfForm" action="{{ route('reportJob') }}" method="GET" target="_blank">
                                                    <input type="hidden" name="job" id="jobInput" value="{{$title}}">
                                                    <button type="submit" class="btn btn-outline-secondary">Cetak Laporan</button>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                        <ul id="dataType" class="nav nav-pills mb-3" role="tablist">
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobservices"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobservices.index' ? 'active' : '' }}" href="{{route('jobservices.index')}}">
                                                    Service
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobspareparts"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobspareparts.index' ? 'active' : '' }}" href="{{route('jobspareparts.index')}}">
                                                    Penjualan Sparepart
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobprograms"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobprograms.index' ? 'active' : '' }}" href="{{route('jobprograms.index')}}">
                                                    Pembuatan aplikasi & web
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobjokis"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobjokis.index' ? 'active' : '' }}" href="{{route('jobjokis.index')}}">
                                                    Joki tugas, skripsi dan jurnal
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobtopups"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobtopups.index' ? 'active' : '' }}" href="{{route('jobtopups.index')}}">
                                                    Topup e-wallet & voucher kuota
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"jobminumans"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'jobminumans.index' ? 'active' : '' }}" href="{{route('jobminumans.index')}}">
                                                    Kopi & minuman
                                                </a>
                                            </li>
                                            <li class="nav-item" data-value='{"path":"pekerjaan","menu":"komisis"}'>
                                                <a class="nav-link {{ Route::currentRouteName() == 'komisis.index' ? 'active' : '' }}" href="{{route('komisis.index')}}">
                                                    Komisi
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
                                        <div class="row justify-content-center mt-5 mx-3">
                                            {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
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
