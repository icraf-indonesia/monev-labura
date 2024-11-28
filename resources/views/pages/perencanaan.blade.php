@extends('header')

@section('content')
    <div class="container-fluid" style="max-width: 1170px; margin: auto;">
        <h2 style="padding-bottom:20px;">Halaman Perencanaan</h2>
        <p>Luas lahan kakao di Kabupaten Luwu Utara mengalami penurunan yang signifikan dalam rentang waktu tahun 2012
            hingga 2021. Berdasarkan data dari Badan Pusat Statistik (BPS) tahun 2021, luas lahan kakao yang awalnya
            mencapai 46.185 hektar pada tahun 2012, kini telah berkurang menjadi 38.435 hektar. Penurunan ini menunjukkan
            adanya permasalahan dalam pengelolaan kakao di wilayah tersebut.</p>
        <p>Salah satu faktor yang menyebabkan penurunan ini adalah berkurangnya daya dukung lingkungan. Perubahan lingkungan
            yang tidak terjaga dengan baik dapat menghambat pertumbuhan dan produktivitas tanaman kakao. Selain itu, ancaman
            bencana alam juga berperan penting dalam penurunan luas lahan kakao. Banyak kebun masyarakat yang sering
            tergenang air secara berkala saat musim penghujan, sehingga tanaman kakao tidak dapat tumbuh dan berproduksi
            secara optimal.</p>
        <p>Dalam analisis tutupan lahan di Kabupaten Luwu Utara, telah dilakukan interpretasi untuk mengidentifikasi sebaran
            kakao dan penggunaan lahan lainnya. Hasilnya menunjukkan adanya tren penurunan luas hutan sejak 2010 hingga
            2021. Penurunan tutupan lahan hutan pada periode 2016-2021 lebih signifikan dibandingkan periode 2010-2016. Pada
            periode 2010-2016, tercatat luas degradasi dan deforestasi hutan sebesar 5.593 hektar dan 723 hektar, namun
            angka tersebut meningkat secara drastis pada periode 2016-2020 menjadi 12.036 hektar dan 12.370 hektar. Hal ini
            menunjukkan adanya tantangan serius dalam pelestarian hutan di Kabupaten Luwu Utara.</p>
        <p align="center">
            <img src="dist/assets/img/grafikbatang.png" alt="">
        </p>
        <div class="table-responsive">
            <table id="tabel-data" class="table table-bordered table-striped" style="width:100%; border:0; font-size:12;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Program</th>
                        <th>Kegiatan</th>
                        <th>Sub kegiatan</th>
                        <th>Indikator Keluaran</th>
                        {{-- <th>Waktu Pelaksanaan</th> --}}
                        <th>Instansi/Lembaga Penanggung Jawab</th>
                        <th>Pembiayaan</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($perencanaan_tables))
                        @foreach ($perencanaan_tables as $perencanaan_table)
                            <tr>
                                <td width="1%">
                                    {{ ($perencanaan_tables->currentPage() - 1) * $perencanaan_tables->perPage() + $loop->iteration }}
                                </td>
                                <td width="10%">{{ $perencanaan_table->program }}</td>
                                <td width="10%">{{ $perencanaan_table->kegiatan }}</td>
                                <td width="10%">{{ $perencanaan_table->subkegiatan }}</td>
                                <td width="10%">{{ $perencanaan_table->indikator_keluaran }}</td>
                                <td width="10%">{{ $perencanaan_table->instansi }}</td>
                                <td width="10%">{{ $perencanaan_table->sumber_pembiayaan }}</td>
                            </tr>
                        @endforeach
                    @else
                <tbody>
                    <tr>
                        <td>Tidak ada data</td>
                    </tr>
                </tbody>
                @endif
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->url($perencanaan_tables->onFirstPage()) }}">First</a></li>
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->previousPageUrl() }}">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ $perencanaan_tables->currentPage() }}</a></li>
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->nextPageUrl() }}">Next</a></li>
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->url($perencanaan_tables->lastPage()) }}">Last</a></li>
            </ul>
        </nav>
        <div class="card-body" style="background-color:#cbcbcb; border-radius: 15px; padding: 20px;">
            <h3 align="center" style="color:#000000; margin-top:10px;"><b>Unduh Dokumen</b></h3>
        </div>
    </div>
@stop
