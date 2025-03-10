@extends('header')

@section('content')
    <div class="container-fluid" style="max-width: 1170px; margin: auto;">
        <h2 style="padding-bottom:20px;">Halaman Perencanaan</h2>
        <p>Kabupaten Labuhanbatu Utara memiliki luas lahan perkebunan yang signifikan, terutama untuk komoditas kelapa
            sawit. Berdasarkan hasil pemetaan tutupan lahan, sejak tahun 2010 hingga 2022 terjadi peningkatan luas lahan
            kelapa sawit, baik dalam bentuk monokultur maupun agroforestri. Di sisi lain, luas lahan untuk komoditas karet,
            baik agroforestri maupun monokultur, serta sawah cenderung mengalami penurunan selama periode tersebut. Pada
            tahun 2022, luas perkebunan kelapa sawit mencapai 61,10% dari total luas tutupan lahan di wilayah ini.</p>
        <p>Pengelolaan kelapa sawit berkelanjutan di Kabupaten Labuhanbatu Utara menghadapi berbagai tantangan strategis,
            seperti infrastruktur perkebunan yang belum memadai, alih fungsi lahan menjadi lahan terbuka dan penggunaan
            lain, serta keterbatasan penyediaan bibit unggul. Untuk mengatasi tantangan ini, Rencana Aksi Daerah Kelapa
            Sawit Berkelanjutan (RAD KSB) Kabupaten Labuhanbatu Utara dirancang sebagai pedoman dalam pengelolaan perkebunan
            kelapa sawit yang berkelanjutan. RAD KSB mencakup lima komponen utama berdasarkan arahan Rencana Aksi Nasional
            Kelapa Sawit Berkelanjutan, yaitu:</p>
        <ul>
            <li>Komponen A: Penguatan data, koordinasi, dan infrastruktur.</li>
            <li>Komponen B: Peningkatan kapasitas dan kapabilitas pekebun.</li>
            <li>Komponen C: Pengelolaan dan pemantauan lingkungan.</li>
            <li>Komponen D: Tata kelola perkebunan dan penanganan sengketa.</li>
            <li>Komponen E: Dukungan percepatan pelaksanaan sertifikasi ISPO dan peningkatan akses pasar produk kelapa
                sawit.</li>
        </ul>
        <p>Dokumen RAD KSB disusun secara partisipatif dengan melibatkan berbagai pemangku kepentingan, termasuk pemerintah
            pusat, pemerintah provinsi, pemerintah kabupaten, lembaga swadaya masyarakat (NGO), perusahaan, dan universitas.
            Setiap pihak memiliki peran penting dalam mendukung implementasi program dan kegiatan yang tercantum di
            dalamnya. Dengan sinergi dari berbagai pihak, RAD KSB diharapkan mampu menjadi dasar yang kuat untuk mewujudkan
            pengelolaan kelapa sawit yang berkelanjutan di Kabupaten Labuhanbatu Utara.</p>
        {{-- <p align="center">
            <img src="dist/assets/img/grafikbatang.png" alt="">
        </p> --}}
        <div class="table-responsive">
            <h1>Matriks RAD KSB Tahun 2024-2025</h1>
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
                <li class="page-item"><a class="page-link"
                        href="{{ $perencanaan_tables->url($perencanaan_tables->onFirstPage()) }}">First</a></li>
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->previousPageUrl() }}">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">{{ $perencanaan_tables->currentPage() }}</a></li>
                <li class="page-item"><a class="page-link" href="{{ $perencanaan_tables->nextPageUrl() }}">Next</a></li>
                <li class="page-item"><a class="page-link"
                        href="{{ $perencanaan_tables->url($perencanaan_tables->lastPage()) }}">Last</a></li>
                <a href="{{ url('/export-pdf') }}" class="btn btn-danger" style="margin-left: 10px;">Download Tabel</a>
            </ul>
        </nav>
        
    </div>
@stop
