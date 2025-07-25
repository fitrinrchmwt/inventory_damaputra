<!DOCTYPE html>
<html>

<head>
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2,
        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Data Produk</h2>
    <p>Berikut adalah laporan data produk</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Kelola Produk</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Jenis Pencatatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id_kelola_pr }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->jenis_pencatatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>