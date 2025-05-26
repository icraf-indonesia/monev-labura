@extends('header')

@section('page_title', 'Daftar Indikator Dampak')

@section('content')
    <div class="row" style="max-width: 1600px; margin: auto;">
        <div class="col-lg-12 col-md-12 col-sm-12 dct-appoinment">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h3>Penambahan</h3> --}}
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
                        <li class="active"><a href="{{ url('') }}/kontributor">Daftar Indikator Dampak</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan">Daftar Kegiatan</a></li>
                        <li><a href="{{ url('') }}/kontributor/indikator/tambah">Input Capaian Indikator Dampak</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan/tambah">Input Capaian Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        {{-- <div class="row">
                            <form method='get' action="{{ url('') }}/kontributor">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="kata" placeholder="Cari .." value="{{ request('kata') }}">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="form-control" type="submit" value="Cari">
                                </div>
                            </form>
                        </div> --}}
                        <div class="row">
                            <form method='get' action="{{ url('') }}/kontributor">
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="kata" 
                                           placeholder="Temukan..." value="{{ request('kata') }}">
                                </div>
                                <div class="col-md-2" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="btn btn-primary" type="submit" value="Telusuri">
                                    @if(request('kata'))
                                        <a href="{{ url('') }}/kontributor" class="btn btn-secondary" style="background: tomato;">Bersihkan</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane active" id="daftar-capaian">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-bordered table-striped"
                                    style="width:100%; border:0; font-size:12;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Indikator</th>
                                            <th>Tahun</th>
                                            <th>Target</th>
                                            <th>Capaian</th>
                                            <th>Satuan</th>
                                            <th>Jenis Dokumen</th>
                                            <th>Lampiran Dokumen</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($indikator_dampaks))
                                            @foreach ($indikator_dampaks as $indikator_dampak)
                                                <tr>
                                                    <td width="1%">
                                                        {{ ($indikator_dampaks->currentPage() - 1) * $indikator_dampaks->perPage() + $loop->iteration }}
                                                    </td>
                                                    <td width="20%">{{ $indikator_dampak->indikator }}</td>
                                                    <td width="10%">{{ $indikator_dampak->tahun }}</td>
                                                    <td width="10%">{{ $indikator_dampak->target }}</td>
                                                    <td width="10%">{{ $indikator_dampak->capaian }}</td>
                                                    <td width="10%">{{ $indikator_dampak->satuan }}</td>
                                                    <td width="10%">{{ $indikator_dampak->jenis_dokumen }}</td>
                                                    <td width="10%">
                                                        @if ($indikator_dampak->dokumen_pendukung)
                                                            <a href="{{ route('view.document', basename($indikator_dampak->dokumen_pendukung)) }}"
                                                                target="_blank" style="color:steelblue">
                                                                Lihat Dokumen
                                                            </a>
                                                        @else
                                                            Belum ada dokumen
                                                        @endif
                                                    </td>
                                                    <td width="10%">
                                                        @if ($indikator_dampak->status === 0)
                                                            <span class="badge rounded-pill" style="background-color: #0d6efd !important;color: #fff; font-size: 16px;">Menunggu</span>
                                                        @elseif($indikator_dampak->status === 1)
                                                            <span class="badge rounded-pill" style="background-color: #198754 !important;color: #fff; font-size: 16px;">Diverifikasi</span>
                                                        @elseif($indikator_dampak->status === 2)
                                                            @if(($indikator_dampak->id_instansi == $currentUserInstansiId) || $isSpecialUser)
                                                                <a href="{{ route('indikator.edit', $indikator_dampak->id) }}" class="btn btn-warning btn-sm" style="width: 100%;"><b>Klik untuk Revisi</b></a>
                                                            @else
                                                                <span class="badge rounded-pill" style="background-color: #dc3545 !important;color: #fff; font-size: 16px;">Perlu Revisi</span>
                                                            @endif
                                                        @endif
                                                    </td>
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
                            <br />
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $indikator_dampaks->appends(['kata' => request('kata')])->url($indikator_dampaks->onFirstPage()) }}">First</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $indikator_dampaks->appends(['kata' => request('kata')])->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">{{ $indikator_dampaks->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $indikator_dampaks->appends(['kata' => request('kata')])->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $indikator_dampaks->appends(['kata' => request('kata')])->url($indikator_dampaks->lastPage()) }}">Last</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
