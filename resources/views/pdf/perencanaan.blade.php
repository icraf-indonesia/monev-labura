<!DOCTYPE html>
<html>
<head>
    <title>Laporan Perencanaan</title>
</head>
<body>
    <h2>Data Perencanaan</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Program</th>
                <th>Kegiatan</th>
                <th>Sub Kegiatan</th>
                <th>Indikator Keluaran</th>
                <th>Instansi</th>
                <th>Pembiayaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->program }}</td>
                    <td>{{ $row->kegiatan }}</td>
                    <td>{{ $row->subkegiatan }}</td>
                    <td>{{ $row->indikator_keluaran }}</td>
                    <td>{{ $row->instansi }}</td>
                    <td>{{ $row->sumber_pembiayaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
