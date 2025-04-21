<!DOCTYPE html>
<html>
<head>
    <title>Tabel Indikator Keluaran</title>
</head>
<body>
    <h2>Data Perencanaan</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Komponen</th>
                <th>Program</th>
                <th>Kegiatan</th>
                <th>Sub Kegiatan</th>
                <th>Indikator Keluaran</th>
                <th>Pelaksana</th>
                <th>Target</th>
                <th>Capaian</th>
                <th>Sumber Pendanaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_kegiatan as $row)
                <tr>
                    <td>{{ $row->komponen }}</td>
                    <td>{{ $row->program }}</td>
                    <td>{{ $row->kegiatan }}</td>
                    <td>{{ $row->subkegiatan }}</td>
                    <td>{{ $row->indikator_keluaran }}</td>
                    <td>{{ $row->instansi }}</td>
                    <td>{{ $row->target }}</td>
                    <td>{{ $row->capaian }}</td>
                    <td>{{ $row->sumber_pembiayaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
