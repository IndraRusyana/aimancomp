<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets\img\icons\brands\aiman.png')}}" />
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
            <h2>Tabel laporan keuntungan per layanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Layanan</th>
                        <th>Keuntungan kotor</th>
                        <th>Modal awal</th>
                        <th>Keuntungan setelah dikurang modal</th>
                        <th>Keuntungan setelah dikurang pengeluaran</th>
                        <th>Keuntungan setelah dikurang pengembangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($dataLaporan as $index => $data) {
                            echo "<tr>";
                            echo "<th>" . $data[0] . "</th>";
                            echo "<td>Rp. " . number_format($data[1], 0, ',', '.') . "</td>";
                            echo "<td>Rp. " . number_format($data[2], 0, ',', '.') . "</td>";
                            echo "<td>Rp. " . number_format($data[3], 0, ',', '.') . "</td>";
                            echo "<td>Rp. " . number_format($data[4], 0, ',', '.') . "</td>";
                            echo "<td>Rp. " . number_format($data[5], 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Dana Pengembangan dan Bagi Hasil</h2>
            <p>Total Pengeluaran: Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
            <p>Dana Pengembangan: Rp {{ number_format($danaPengembangan, 0, ',', '.') }}</p>
            <p>Dana Bagi Hasil: Rp {{ number_format($danaBagiHasil, 0, ',', '.') }}</p>
        </div>

        @if ($role == "investor")
        <div class="section">
            <h2>Keuntungan Investor</h2>
            @if ($email == "investor1@mail.com")
            <p>Keuntungan {{$name}}: Rp {{ number_format($keuntunganInvestor1, 0, ',', '.') }}</p>
            @endif
            @if ($email == "investor2@mail.com")
            <p>Keuntungan {{$name}}: Rp {{ number_format($keuntunganInvestor2, 0, ',', '.') }}</p>
            @endif
        </div>
        @else
        <div class="section">
            <h2>Keuntungan Investor</h2>
        @foreach ($investor as $data)
            @if ($data->email == "investor1@mail.com")
            <p>Keuntungan {{$name}}: Rp {{ number_format($keuntunganInvestor1, 0, ',', '.') }}</p>
            @endif
            @if ($data->email == "investor2@mail.com")
            <p>Keuntungan {{$name}}: Rp {{ number_format($keuntunganInvestor2, 0, ',', '.') }}</p>
            @endif
        @endforeach
        </div>
        @endif
        
        <div class="section">
            <h2>Keuntungan Owner</h2>
            @if(auth()->user()->isOwner())
            <p>Keuntungan Owner dari Layanan: Rp {{ number_format($KeuntunganOwnerDariLayanan, 0, ',', '.') }}</p>
            @endif
            <p>Keuntungan Owner dari Investasi: Rp {{ number_format($keuntunganOwnerDariInvestasi, 0, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>
