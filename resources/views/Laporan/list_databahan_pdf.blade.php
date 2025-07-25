<!DOCTYPE html>
<html>

<head>
    <title>Data Bahan</title>
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
    <h2>Laporan Data Bahan</h2>
    <p>Berikut adalah laporan data Bahan</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Kelola Bahan</th>
                <th>Tanggal</th>
                <th>Nama Bahan</th>
                <th>Jumlah</th>
                <th>Jenis Pencatatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_laporanbahan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id_kelola_bb }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_bahan }}</td>
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