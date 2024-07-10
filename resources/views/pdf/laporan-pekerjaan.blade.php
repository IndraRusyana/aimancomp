<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <div class="table-responsive text-nowrap" id="table-content">
            <table class="table table-striped" id="dataTable">
                <thead id="tableHead">
                    <tr>
                        <th>No</th>
                        @foreach ($columnsSubset as $column)
                            <th>{{$column}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="tableBody">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($query as $item)
                        <tr id="index_{{ $item->id }}" data-id="{{ $item->id }}">
                            <td>{{ $no }}</td>
                            @foreach ($columnsSubset as $column)
                                <td>{{ $item->$column }}</td>
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
