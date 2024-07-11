<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <style>
        /* Tambahkan styling sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
        .heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .section table {
            width: 100%;
            border-collapse: collapse;
        }
        .section table, .section th, .section td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Laporan Keuangan</h1>
        <div class="section">
            <h2>Periode Laporan: {{ $titlePeriode }}</h2>
        </div>

        <div class="section">
            <h2>Total Keuntungan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Layanan</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Job Service</td>
                        <td>Rp {{ number_format($totalKeuntunganJobService, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Job Sparepart</td>
                        <td>Rp {{ number_format($totalKeuntunganJobSparepart, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Job Program</td>
                        <td>Rp {{ number_format($totalKeuntunganJobProgram, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Job Joki</td>
                        <td>Rp {{ number_format($totalKeuntunganJobJoki, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Job Topup</td>
                        <td>Rp {{ number_format($totalKeuntunganJobTopup, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Job Drink</td>
                        <td>Rp {{ number_format($totalKeuntunganJobDrink, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>Rp {{ number_format($totalSeluruhKeuntungan, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Dana Pengembangan dan Bagi Hasil</h2>
            <p>Dana Pengembangan: Rp {{ number_format($danaPengembangan, 0, ',', '.') }}</p>
            <p>Dana Bagi Hasil: Rp {{ number_format($danaBagiHasil, 0, ',', '.') }}</p>
            <p>Total Pengeluaran: Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
        </div>

        <div class="section">
            <h2>Keuntungan Investor dan Owner</h2>
            <p>Keuntungan Investor 1: Rp {{ number_format($keuntunganBersihInvestor1, 0, ',', '.') }}</p>
            <p>Keuntungan Investor 2: Rp {{ number_format($keuntunganBersihInvestor2, 0, ',', '.') }}</p>
            <p>Keuntungan Owner: Rp {{ number_format($keuntunganBersihOwner, 0, ',', '.') }}</p>
        </div>

        <div class="section">
            <h2>Pengeluaran Investor dan Owner</h2>
            <p>Pengeluaran Investor 1: Rp {{ number_format($pengeluaranInvestor1, 0, ',', '.') }}</p>
            <p>Pengeluaran Investor 2: Rp {{ number_format($pengeluaranInvestor2, 0, ',', '.') }}</p>
            <p>Pengeluaran Owner: Rp {{ number_format($pengeluaranOwner, 0, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>
