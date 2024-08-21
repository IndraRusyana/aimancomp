<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('assets\img\icons\brands\aiman.png')}}" />
    <title>Laporan Pekerjaan PDF</title>
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
        <h1 class="heading">Laporan {{$job}}</h1>
        <div class="section">
            <h2>Periode Laporan: Semua Waktu</h2>
        </div>

        <div class="section" >
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        @foreach ($columnsSubset as $column)
                            <th>{{$column}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($query as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            @foreach ($columnsSubset as $column)
                                @if ($column === 'harga' || $column === 'nominal' || $column === 'modal' || $column === 'harga_awal' || $column === 'harga_jual')
                                    <td>@formatRupiah($item->$column)</td>
                                @else {
                                    <td>{{ $item->$column }}</td>
                                }
                                @endif
                            @endforeach
                        </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>Total : @formatRupiah($total)</p>
    </div>
</body>
</html>
