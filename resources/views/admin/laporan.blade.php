@extends('layouts.admin')

@section('title')
    Laporan Keuangan || Admin
@endsection

@section('laporan')
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

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <h5 class="card-header">Laporan Form Controls</h5>
                                    <div class="card-body">
                                        <form action="{{ route('laporanIndex') }}" method="get" id="laporanForm">
                                            <div class="mb-3">
                                                <label for="jenis_laporan" class="form-label">Pilih Jenis Laporan</label>
                                                <select class="form-select" id="jenis_laporan" name="jenis_laporan"
                                                    required>
                                                    <option value="all" selected>Semua data</option>
                                                    <option value="hari">Laporan Harian</option>
                                                    <option value="bulan">Laporan Bulanan</option>
                                                    <option value="periode">Laporan Periode</option>
                                                </select>
                                            </div>

                                            <!-- Input Date Range -->
                                            <div class="mb-3 row" id="inputDateRange" style="display: none;">
                                                <div class="col-6 mx-auto">
                                                    <label for="start-date-input" class="col-md-2 col-form-label">Start
                                                        Date</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="date" id="start-date-input"
                                                            name="start_date" />
                                                    </div>
                                                </div>
                                                <div class="col-6 mx-auto">
                                                    <label for="end-date-input" class="col-md-2 col-form-label">End
                                                        Date</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="date" id="end-date-input"
                                                            name="end_date" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Date -->
                                            <div class="mb-3 row" id="inputDate">
                                                <div class="col-4 mx-auto">
                                                    <label for="html5-date-input"
                                                        class="col-md-2 col-form-label">Date</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="date" id="html5-date-input"
                                                            name="date_input" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Input Month -->
                                            <div class="mb-3 row" id="inputMonth">
                                                <div class="col-4 mx-auto">
                                                    <label for="html5-month-input"
                                                        class="col-md-2 col-form-label">Month</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="month" id="html5-month-input"
                                                            name="month_input" />
                                                    </div>
                                                </div>
                                            </div>

                                            <center>
                                                <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                                            </center>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <h5 class="card-header">Menampilkan Laporan Periode : 
                                                <div id="laporanHeader"
                                                    class="d-inline">{{ $titlePeriode }}
                                                </div>
                                            </h5>
                                        </div>
                                        <div class="col-2">
                                            <form id="pdfForm" action="{{ route('reportFinancial') }}" method="GET" target="_blank">
                                                <input type="hidden" name="jenisLaporan" id="jenisLaporanInput" value="{{ $jenisLaporan }}">
                                                <input type="hidden" name="resultForReport" id="resultForReportInput" value="{{ $resultForReport }}">
                                                <button type="submit" class="btn btn-primary my-3">Cetak Laporan</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Total keuntungan -->
                            <div class="col-md-6 col-lg-4 order-2 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Total keuntungan</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Service</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobService)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Sparepart</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobSparepart)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/chart.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Aplikasi / Web</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobProgram)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Joki</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobJoki)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Topup</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobTopup)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Minuman</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobDrink)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- total pemasukan --}}
                            <div class="col-md-6 col-lg-4 order-2 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Total pemasukan</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Service</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">

                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobService)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Sparepart</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalHargaJobSparepart)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/chart.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Aplikasi / Web</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobProgram)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Joki</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalKeuntunganJobJoki)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Topup</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalHargaJobTopup)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Minuman</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalHargaJobDrink)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- total modal awal --}}
                            <div class="col-md-6 col-lg-4 order-2 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Total modal awal</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Sparepart</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalModalJobSparepart)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Topup</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalModalJobTopup)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Minumam</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($totalModalJobDrink)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-4 order-0 mb-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/cc-primary.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Total seluruh keuntungan</span>
                                                <h3 class="card-title mb-2">@formatRupiah($totalSeluruhKeuntungan)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/cc-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Dana pengembangan</span>
                                                <h3 class="card-title mb-2">@formatRupiah($danaPengembangan)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/cc-warning.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Dana bagi hasil</span>
                                                <h3 class="card-title mb-2">@formatRupiah($danaBagiHasil)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/wallet.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Total keuntungan investor</span>
                                                <h3 class="card-title mb-2">@formatRupiah($totalKeuntunganInvestor)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- keuntungan per investor --}}
                            <div class="col-md-6 col-lg-4 order-1 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Keuntungan Per Investor</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Investor 1</h6>
                                                        <small class="text-muted">50%</small>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($keuntunganInvestor1)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                                        class="rounded" />
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Investor 2</h6>
                                                        <small class="text-muted">2%</small>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <h6 class="mb-0">@formatRupiah($keuntunganInvestor2)</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- keuntungan owner --}}
                            <div class="col-md-6 col-lg-4 order-2 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/chart-success.png"
                                                    alt="chart success" class="rounded" />
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Keuntungan owner</span>
                                        <h3 class="card-title mb-2">@formatRupiah($keuntunganOwner)</h3>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisLaporanSelect = document.getElementById('jenis_laporan');
            const inputDate = document.getElementById('inputDate');
            const inputMonth = document.getElementById('inputMonth');
            const dateInput = document.getElementById('html5-date-input');
            const monthInput = document.getElementById('html5-month-input');
            const inputDateRange = document.getElementById('inputDateRange');
            const startDateInput = document.getElementById('start-date-input');
            const endDateInput = document.getElementById('end-date-input');

            // Function to toggle visibility of date and month inputs
            function toggleInputs() {
                if (jenisLaporanSelect.value === 'hari') {
                    dateInput.required = true;
                    monthInput.required = false;
                    startDateInput.required = false;
                    endDateInput.required = false;
                    inputDate.style.display = 'block';
                    inputMonth.style.display = 'none';
                    inputDateRange.style.display = 'none';
                } else if (jenisLaporanSelect.value === 'bulan') {
                    monthInput.required = true;
                    dateInput.required = false;
                    startDateInput.required = false;
                    endDateInput.required = false;
                    inputDate.style.display = 'none';
                    inputMonth.style.display = 'block';
                    inputDateRange.style.display = 'none';
                } else if (jenisLaporanSelect.value === 'periode') {
                    inputDateRange.style.display = 'block';
                    startDateInput.required = true;
                    endDateInput.required = true;
                    monthInput.required = false;
                    dateInput.required = false;
                    inputDate.style.display = 'none';
                    inputMonth.style.display = 'none';
                }   
                else {
                    inputDate.style.display = 'none';
                    inputMonth.style.display = 'none';
                    inputDateRange.style.display = 'none';
                }
            }

            // Initial toggle based on default select value
            toggleInputs();

            // Event listener for changes in select input
            jenisLaporanSelect.addEventListener('change', function() {
                toggleInputs();
            });
        });
    </script>
@endsection
