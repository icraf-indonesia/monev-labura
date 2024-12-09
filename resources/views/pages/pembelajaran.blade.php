@extends('header')

@section('css')
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin-bottom: 1rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    a {
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
@stop

@section('content')
    <div class="container-fluid" style="max-width: 1170px; margin: auto;">
        <h2 style="padding-bottom:20px;">Pembelajaran</h2>
        <p>Halaman pembelajaran ini akan menjadi modul yang memuat sejumlah informasi dalam berbagai bentuk (bahan ajar,
            regulasi, maupun video) untuk mendukung penguatan kapasitas para pemangku kepentingan di Kabupaten Labuhanbatu
            Utara dalam rangka pembangunan kelapa sawit berkelanjutan. Sedikitnya modul ini akan memuat seputar (masih dapat
            dikembangkan):</p>
        <p align="center">
            <img src="dist/assets/img/Pembelajaran.png" alt="">
        </p>
        <table id="tabel-data" class="table table-bordered table-striped" style="width:100%; border:0; font-size:12;">
            <tr>
                <th>Dokumen</th>
                <th>Unduh</th>
            </tr>
            <tr>
                <td>Regulasi Kelapa Sawit Berkelanjutan</td>
                <td><a href="https://drive.google.com/file/d/1Ht8eOd5S5L2dfk93vEEMsHATZE_2EI45/view?usp=sharing">Klik
                        disini</a></td>
            </tr>
            <tr>
                <td>RAN KSB</td>
                <td><a href="https://drive.google.com/file/d/1nDgSjU_2_cVbpQFsw8DsmPBIu_yoTX1J/view?usp=sharing">Klik
                        disini</a></td>
            </tr>
            <tr>
                <td>Panduan Penyusunan dan Pelaksanaan RAD KSB</td>
                <td><a href="https://drive.google.com/file/d/1oBLzccdfy0IAhP_HSRg7Q8a4kz780en1/view?usp=sharing">Klik
                        disini</a></td>
            </tr>
            <tr>
                <td>Pengantar Good Agriculture Practices (GAP) dalam pengelolaan sawit</td>
                <td><a href="/the_url">Klik disini</a></td>
            </tr>
            <tr>
                <td>Pengelolaan Agroforestri Kelapa Sawit</td>
                <td><a href="/the_url">Klik disini</a></td>
            </tr>
        </table>
        <h2 style="padding-bottom:20px;">Kebijakan Pengelolaan Sawit</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-sm-10">
                        <h4>Tata Kelola Kelapa Sawit Berkelanjutan</h4>
                        <p>Tema ini mencakup prinsip dan praktik yang mendukung pengelolaan kelapa sawit secara bertanggung
                            jawab, termasuk kepatuhan terhadap regulasi, sertifikasi keberlanjutan (seperti RSPO dan ISPO),
                            pengelolaan lingkungan, dan pemberdayaan masyarakat lokal. Materi ini bertujuan untuk memastikan
                            bahwa seluruh proses produksi dan pengelolaan kelapa sawit mendukung keberlanjutan sosial,
                            ekonomi, dan lingkungan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-sm-10">
                        <h4>Good Agriculture Practices (GAP)</h4>
                        <p>Tema ini berfokus pada penerapan praktik pertanian terbaik dalam budidaya kelapa sawit. Hal ini
                            mencakup teknik pembibitan, pemupukan, pengelolaan hama dan penyakit, panen, dan pemeliharaan
                            kebun yang efisien dan ramah lingkungan. Materi ini bertujuan untuk meningkatkan produktivitas
                            kebun kelapa sawit sekaligus menjaga kelestarian sumber daya alam.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-sm-10">
                        <h4>Agroforestri Kelapa Sawit</h4>
                        <p>Tema ini memperkenalkan konsep dan manfaat agroforestri dalam sistem kelapa sawit, di mana
                            tanaman sawit dikombinasikan dengan tanaman lain, seperti pohon kayu atau tanaman pangan.
                            Pendekatan ini bertujuan untuk meningkatkan keanekaragaman hayati, efisiensi penggunaan lahan,
                            dan ketahanan ekonomi petani, serta mengurangi dampak negatif terhadap lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="padding-bottom: 20px;">
            <div class="card-body" style="background-color:#cbcbcb; border-radius: 15px; padding: 20px;">
                <h3 align="center" style="color:#000000; margin-top:10px;"><b>Unduh Dokumen</b></h3>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
