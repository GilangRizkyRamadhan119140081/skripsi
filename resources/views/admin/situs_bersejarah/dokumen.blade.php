<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* Tetapkan lebar kolom */
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            word-wrap: break-word; /* Memecah kata */
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

        img {
            max-width: 100%; /* Membuat gambar tetap dalam batas lebar tabel */
            height: auto; /* Mencegah pemuaian gambar */
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Dokumen Situs Bersejarah</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Situs</th>
                <th>Nama Situs</th>
                <th>Alamat Situs</th>
                <th>Tanggal Berdiri Situs</th>
                <th>Kontributor Situs</th>
                <th>Jenis Situs</th>
                <th>Status Situs</th>
                <th>Keterangan Situs</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $s)
            <tr>
                <td>{{ $s->id_situs }}</td>
                <td>{{ $s->nama_situs }}</td>
                <td>{{ $s->alamat_situs }}</td>
                <td>{{ $s->tanggal_berdiri_situs }}</td>
                <td>{{ $s->pemilik_situs }}</td>
                <td>{{ $s->jenis_situs }}</td>
                <td>{{ $s->status_situs }}</td>
                <td>{{ $s->keterangan_situs }}</td> 
                <td>{{ $s->created_at }}</td>
                <td>{{ $s->updated_at }}</td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
