@extends('header')

@section('page_title', 'Verifikasi Capaian')

@section('content')
    <div class="row" style="max-width: 1200px; margin: auto;">
        <div class="col-lg-12 col-md-12 col-sm-12 dct-appoinment">
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Input gagal.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs paitent-app-tab">
                        <li><a href="{{url('')}}/admin">Manajemen Target Indikator</a></li>
                        <li ><a href="{{url('')}}/admin/indikator/verifikasi">Verifikasi Input Indikator</a></li>
                        <li><a href="{{url('')}}/admin/kegiatan">Manajemen Target Kegiatan</a></li>
                        <li class="active"><a href="{{url('')}}/admin/kegiatan/verifikasi">Verifikasi Input Kegiatan</a></li>
                        <li><a href="{{url('')}}/admin/tambah-kegiatan">Tambah Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        {{-- tab verifikasi indikator --}}
                        <div class="tab-pane active" id="verifikasi-capaian">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-bordered table-striped" style="width:100%; border:0; font-size:12;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Indikator Keluaran</th>
                                            <th>Pelaksana</th>
                                            <th>Sumber Pendanaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                            <tr>
                                                <td width="1%">1</td>
                                                <td width="10%">Penguatan data dasar Perkebunan Kelapa Sawit untuk dukungan tata kelola perkebunan yang lebih baik</td>
                                                <td width="1%">Penyelenggaraan Statistik Sektoral di Lingkup Daerah Kabupaten/Kota</td>
                                                <td width="1%">Koordinasi dan Sinkronisasi Pengumpulan, Pengolahan, Analisis dan Diseminasi Data Statistik Sektora</td>
                                                <td width="1%">Jumlah dokumen koordinasi dan sinkronisasi pengumpulan, pengolahan, analisis, dan diseminasi data statistik sektoral</td>
                                                <td width="1%">BPS</td>
                                                <td width="1%">APBD</td>
                                                <td width="6%">
                                                    {{-- @if($c->status == 0) --}}
                                                        <form action="/admin/kegiatan/verify/" method="post" class="d-inline" style="float: left; margin-right: 5px;">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="1" name="status">
                                                            <input type="hidden" value="" name="verified_by">
                                                            <button type="submit" class="custom-badge status-blue bg-primary" onclick="return confirm('Approve data ini?')">Approve</button>
                                                        </form>
                                                        <form action="/admin/kegiatan/reject/" method="post" class="d-inline">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="2" name="status">
                                                            <input type="hidden" value="" name="verified_by">
                                                            <button type="submit" class="custom-badge status-red bg-danger" onclick="return confirm('Revisi data ini?')">Revisi</button>
                                                        </form>
                                                    {{-- @elseif($c->status == 2)
                                                        <form action="/admin/capaian/verify/{{ $c->id }}" method="post" class="d-inline" style="float: left; margin-right: 5px;">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="1" name="status">
                                                            <input type="hidden" value="{{Auth::user()->name}}" name="verified_by">
                                                            <button type="submit" class="custom-badge status-blue bg-info" onclick="return confirm('Approve data ini?')">Approve</button>
                                                        </form>
                                                    @endif --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">2</td>
                                                <td width="10%">Peningkatan Sinergitas antar kementerian/lembaga pemerintah daerah dalam hubungannya dengan usaha perkebunan kelapa sawit</td>
                                                <td width="1%">Koordinasi dan Sinkronisasi Pengendalian Pemanfaatan Ruang Daerah Kabupaten/Kota</td>
                                                <td width="1%">Koordinasi Pelaksanaan Penataan Ruang</td>
                                                <td width="1%">Jumlah Dokumen Koordinasi Pelaksanaan Penataan Ruang</td>
                                                <td width="1%">Dinas Pertanian</td>
                                                <td width="1%">APBD</td>
                                                <td width="6%">
                                                    {{-- @if($c->status == 0) --}}
                                                        <form action="/admin/kegiatan/verify/" method="post" class="d-inline" style="float: left; margin-right: 5px;">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="1" name="status">
                                                            <input type="hidden" value="" name="verified_by">
                                                            <button type="submit" class="custom-badge status-blue bg-primary" onclick="return confirm('Approve data ini?')">Approve</button>
                                                        </form>
                                                        <form action="/admin/kegiatan/reject/" method="post" class="d-inline">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="2" name="status">
                                                            <input type="hidden" value="" name="verified_by">
                                                            <button type="submit" class="custom-badge status-red bg-danger" onclick="return confirm('Revisi data ini?')">Revisi</button>
                                                        </form>
                                                    {{-- @elseif($c->status == 2)
                                                        <form action="/admin/capaian/verify/{{ $c->id }}" method="post" class="d-inline" style="float: left; margin-right: 5px;">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="1" name="status">
                                                            <input type="hidden" value="{{Auth::user()->name}}" name="verified_by">
                                                            <button type="submit" class="custom-badge status-blue bg-info" onclick="return confirm('Approve data ini?')">Approve</button>
                                                        </form>
                                                    @endif --}}
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br />
                            {{-- <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $capaian->url($capaian->onFirstPage()) }}">First</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $capaian->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">{{ $capaian->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $capaian->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $capaian->url($capaian->lastPage()) }}">Last</a></li>
                                </ul>
                            </nav> --}}
                        </div>

                        {{-- <div class="tab-pane" id="e">
                            <h4>Hapus Data</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
