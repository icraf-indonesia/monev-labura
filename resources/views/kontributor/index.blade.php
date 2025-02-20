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
                        {{-- @if (Auth::check())
                            @if (Auth::user()->role === 'kontributor')
                                <li><a href="{{url('')}}/kontributor/capaian/tambah">Input Indikator Dampak</a></li>
                            @endif
                        @endif
                        <li><a href="{{url('')}}/kontributor/kegiatan">Pelaksanaan Kegiatan</a></li>
                        @if (Auth::check())
                            @if (Auth::user()->role !== 'others')
                            <li><a href="{{url('')}}/kontributor/realisasi/tambah">Daftar Input Kegiatan</a></li>
                            @endif
                        @endif --}}
                        <li><a href="{{ url('') }}/kontributor/indikator/tambah">Input Indikator Dampak</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan">Pelaksanaan Kegiatan</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan/tambah">Daftar Input Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="row">
                            <form method='get' action="{{ url('') }}/kontributor">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="kata"
                                        placeholder="Cari Input Capaian .." value="{{ old('kata') }}">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="form-control" type="submit" value="Cari">
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
                                            <th>Dokumen</th>
                                            <th>Keterangan</th>
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
                                                    <td width="10%">
                                                        @if(!empty($indikator_dampak->dokumen_pendukung) && strtolower($indikator_dampak->dokumen_pendukung) !== "tidak ada")
                                                            <a href="{{ asset('storage/' . $indikator_dampak->dokumen_pendukung) }}" target="_blank" class="btn btn-danger">
                                                                Lihat Dokumen
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Tidak Ada Dokumen</span>
                                                        @endif
                                                    </td>
                                                    <td width="10%">
                                                        @if ($indikator_dampak->keterangan === 'Baseline')
                                                            <span class="badge rounded-pill"
                                                                style="background-color: #ebebe2 !important;color: #000;">Baseline</span>
                                                        @elseif($indikator_dampak->keterangan === 'Aktual')
                                                            <span class="badge rounded-pill"
                                                                style="background-color: #198754 !important;color: #fff;">Aktual</span>
                                                        {{-- @else
                                                            <a class="custom-badge status-green text-right"
                                                                href="/kontributor/indikator/{{ $indikator_dampak->id }}">
                                                                Revisi
                                                            </a> --}}
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
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $indikator_dampaks->url($indikator_dampaks->onFirstPage()) }}">First</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $indikator_dampaks->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="#">{{ $indikator_dampaks->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $indikator_dampaks->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $indikator_dampaks->url($indikator_dampaks->lastPage()) }}">Last</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
