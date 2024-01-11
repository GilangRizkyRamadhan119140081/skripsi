<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Optional: Hover effect */
        tr:hover {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Laporan Pengajuan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Jenis Keperluan</th>
                <th>Keterangan</th>
                <th>Surat Perizinan</th>
                <th>Gambar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $formulir)
                <tr>
                    <td>{{ $formulir->nama }}</td>
                    <td>{{ $formulir->instansi }}</td>
                    <td>{{ $formulir->email }}</td>
                    <td>{{ $formulir->alamat }}</td>
                    <td>{{ $formulir->nomor_hp }}</td>
                    <td>{{ $formulir->jenis_keperluan }}</td>
                    <td>{{ $formulir->keterangan }}</td>
                    <td>{{ $formulir->surat_perizinan }}</td>
                    <td>{{ $formulir->gambar }}</td>
                    <td>{{ $formulir->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

