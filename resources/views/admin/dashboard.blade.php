@extends('layouts.admin')

@section('title')
    Dashboard || Admin
@endsection

@section('dashboard')
    active
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('components.sidebar')

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
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name }}🎉</h5>
                                                <p class="mb-4">
                                                    Profil Akun Mu :
                                                    <li>
                                                        Email : {{ Auth::user()->email }}
                                                    </li>
                                                    <li>
                                                        Role : {{ Auth::user()->role }}
                                                    </li>
                                                </p>

                                                <a href="/admin/laporan" class="btn btn-sm btn-outline-primary">View
                                                    Report</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="../assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="card pb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                            <div
                                                class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                <div class="card-title">
                                                    <h5 class="text-nowrap mb-2">Profile Report Aimancomp</h5>
                                                    <span class="badge bg-label-warning rounded-pill">Year
                                                        2024</span>
                                                </div>
                                                <div class="mt-sm-auto">
                                                    <h3 class="mb-0">@formatRupiah($totalKeuntungan)</h3>
                                                </div>
                                            </div>
                                            {{-- <div id="profileReportChart"></div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Order Statistik</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <h2 class="mb-2">{{ $jmlTransaksi }}</h2>
                                                <span>Total Orders</span>
                                            </div>
                                            {{-- <div id="orderStatisticsChart"></div> --}}
                                            <div id="jmlTransaksi"></div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #008FFB"><i
                                                            class="bx bx-mobile-alt"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Service</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobService }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #00E396"><i
                                                            class="bx bx-chip"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Sparepart</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobSparepart }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #FEB019"><i
                                                            class="bx bx-home-alt"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Web / Aplikasi</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobProgram }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #FF4560"><i
                                                            class="bx bx-notepad"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Joki</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobJoki }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #775DD0"><i
                                                            class="bx bx-wallet"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Topup</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobTopup }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #5C4742"><i
                                                            class="bx bx-coffee"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Minuman</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlJobDrink }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-2 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded" style="background-color: #A5978B"><i
                                                            class="bx bx-coin-stack"></i></span>
                                                </div>
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Komisi</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold">{{ $jmlKomisi }}</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->

                            <!-- Expense Overview -->
                            <div class="col-md-12 col-lg-8 order-1 mb-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Pemasukan dan Pengeluaran</h5>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="tab-content p-0">
                                            <div id="chartTransaksi"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Expense Overview -->

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

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        // Fungsi untuk format Rupiah
        function formatRupiah(angka) {
            let rupiah = '';
            let angkarev = angka.toString().split('').reverse().join('');
            for (let i = 0; i < angkarev.length; i++) {
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            }
            return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        // Fungsi untuk menghitung persentase
        function calculatePercentage(value, total) {
            return parseFloat(((value / total) * 100).toFixed(1));
        }

        let jmlJobService = {{ $jmlJobService }}
        let jmlJobSparepart = {{ $jmlJobSparepart }}
        let jmlJobProgram = {{ $jmlJobProgram }}
        let jmlJobJoki = {{ $jmlJobJoki }}
        let jmlJobTopup = {{ $jmlJobTopup }}
        let jmlJobDrink = {{ $jmlJobDrink }}
        let jmlKomisi = {{ $jmlKomisi }}
        let jmlTransaksi = {{ $jmlTransaksi }}
        let keuntungan = {!! json_encode($keuntunganBulanan) !!};
        let pengeluaran = {!! json_encode($pengeluaranBulanan) !!};

        // Iterasi dan format setiap nilai dalam objek
        for (let bulan in keuntungan) {
            if (keuntungan.hasOwnProperty(bulan)) {
                keuntungan[bulan] = formatRupiah(keuntungan[bulan]);
            }
        }

        for (let bulan in pengeluaran) {
            if (pengeluaran.hasOwnProperty(bulan)) {
                pengeluaran[bulan] = formatRupiah(pengeluaran[bulan]);
            }
        }

        console.log(keuntungan); // Cek hasil format Rupiah
        console.log(pengeluaran); // Cek hasil format Rupiah


        // Hitung persentase untuk setiap kategori
        let percService = calculatePercentage(jmlJobService, jmlTransaksi);
        let percSparepart = calculatePercentage(jmlJobSparepart, jmlTransaksi);
        let percProgram = calculatePercentage(jmlJobProgram, jmlTransaksi);
        let percJoki = calculatePercentage(jmlJobJoki, jmlTransaksi);
        let percTopup = calculatePercentage(jmlJobTopup, jmlTransaksi);
        let percDrink = calculatePercentage(jmlJobDrink, jmlTransaksi);
        let percKomisi = calculatePercentage(jmlKomisi, jmlTransaksi);

        var options = {
            chart: {
                height: 165,
                width: 130,
                type: 'donut'
            },
            series: [percService, percSparepart, percProgram, percJoki, percTopup, percDrink, percKomisi],
            labels: ['Service', 'Sparepart', 'Program', 'Joki', 'Topup', 'Minuman', 'Komisi'],
            colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#5C4742', '#A5978B'],
            dataLabels: {
                enabled: false,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            legend: {
                show: false
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    right: 15
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%',
                        labels: {
                            show: true,
                            value: {
                                fontSize: '1.5rem',
                                fontFamily: 'Public Sans',
                                offsetY: -15,
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: 'Public Sans'
                            },
                            total: {
                                show: true,
                                fontSize: '0.8125rem',
                                label: 'Transaksi',
                                formatter: function(w) {
                                    return jmlTransaksi;
                                }
                            }
                        }
                    }
                }
            }
        }

        var chart = new ApexCharts(document.querySelector("#jmlTransaksi"), options);
        chart.render();

        var options = {
            series: [{
                name: 'Pemasukan',
                data: [
                    {!! $keuntunganBulanan[1] !!}, {!! $keuntunganBulanan[2] !!}, {!! $keuntunganBulanan[3] !!},
                    {!! $keuntunganBulanan[4] !!}, {!! $keuntunganBulanan[5] !!}, {!! $keuntunganBulanan[6] !!},
                    {!! $keuntunganBulanan[7] !!}, {!! $keuntunganBulanan[8] !!}, {!! $keuntunganBulanan[9] !!},
                    {!! $keuntunganBulanan[10] !!}, {!! $keuntunganBulanan[11] !!}, {!! $keuntunganBulanan[12] !!}
                ] // Data pemasukan bulanan numerik
            }, {
                name: 'Pengeluaran',
                data: [
                    {!! $pengeluaranBulanan[1] !!}, {!! $pengeluaranBulanan[2] !!}, {!! $pengeluaranBulanan[3] !!},
                    {!! $pengeluaranBulanan[4] !!}, {!! $pengeluaranBulanan[5] !!}, {!! $pengeluaranBulanan[6] !!},
                    {!! $pengeluaranBulanan[7] !!}, {!! $pengeluaranBulanan[8] !!}, {!! $pengeluaranBulanan[9] !!},
                    {!! $pengeluaranBulanan[10] !!}, {!! $pengeluaranBulanan[11] !!}, {!! $pengeluaranBulanan[12] !!}
                ] // Data pengeluaran bulanan numerik
            }],
            chart: {
                height: 450,
                type: 'area',
                zoom: {
                    autoScaleYaxis: true
                }
            },
            colors: ['#696cff', '#ff3e1d'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            xaxis: {
                type: 'category',
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ] // Nama bulan dalam satu tahun
            },
            tooltip: {
                x: {
                    format: 'MMM' // Format tooltip menjadi singkatan bulan
                },
                y: {
                    formatter: function(value) {
                        return formatRupiah(value); // Format Rupiah untuk tooltip
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartTransaksi"), options);
        chart.render();
    </script>
@endsection
