@extends('header')

@section('page_title', 'Daftar Kegiatan')

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
                        <li><a href="{{ url('') }}/kontributor">Daftar Indikator Dampak</a></li>
                        <li><a href="{{ url('') }}/kontributor/indikator/tambah">Input Indikator
                                Dampak</a></li>
                        <li class="active"><a href="{{ url('') }}/kontributor/kegiatan">Pelaksanaan Kegiatan</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan/tambah">Daftar Input Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="row">
                            <form method='get' action="{{ url('') }}/kontributor/kegiatan">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="kata" placeholder="Cari Kegiatan .."
                                        value="{{ old('kata') }}">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="form-control" type="submit" value="Cari">
                                </div>
                            </form>
                        </div>
                        {{-- tab daftar kegiatan  --}}
                        <div class="tab-pane active" id="daftar-kegiatan">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-bordered table-striped"
                                    style="width:100%; border:0; font-size:12;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Komponen</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Indikator Keluaran</th>
                                            <th>Pelaksana</th>
                                            <th>Target</th>
                                            <th>Capaian</th>
                                            <th>Sumber Pendanaan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($kegiatan_tables))
                                            @foreach ($kegiatan_tables as $kegiatan_table)
                                                <tr>
                                                    <td width="1%">
                                                        {{ ($kegiatan_tables->currentPage() - 1) * $kegiatan_tables->perPage() + $loop->iteration }}
                                                    </td>
                                                    <td width="10%">{{ $kegiatan_table->komponen }}</td>
                                                    <td width="10%">{{ $kegiatan_table->program }}</td>
                                                    <td width="10%">{{ $kegiatan_table->kegiatan }}</td>
                                                    <td width="10%">{{ $kegiatan_table->subkegiatan }}</td>
                                                    <td width="10%">{{ $kegiatan_table->indikator_keluaran }}</td>
                                                    <td width="10%">{{ $kegiatan_table->instansi }}</td>
                                                    <td width="10%">{{ $kegiatan_table->target }}</td>
                                                    <td width="10%">{{ $kegiatan_table->capaian }}</td>
                                                    <td width="10%">{{ $kegiatan_table->sumber_pembiayaan }}</td>
                                                    <td width="10%">
                                                        @if ($kegiatan_table->status === 0)
                                                            <span class="badge rounded-pill"
                                                                style="background-color: #0d6efd !important;color: #fff;">Menunggu</span>
                                                        @elseif($kegiatan_table->status === 1)
                                                            <span class="badge rounded-pill"
                                                                style="background-color: #198754 !important;color: #fff;">Diverifikasi</span>
                                                        @else
                                                            {{-- <a class="custom-badge status-green text-right"
                                                                href="/kontributor/kegiatan/{{ $kegiatan_table->id }}">
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
                                            href="{{ $kegiatan_tables->url($kegiatan_tables->onFirstPage()) }}">First</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $kegiatan_tables->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="#">{{ $kegiatan_tables->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $kegiatan_tables->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $kegiatan_tables->url($kegiatan_tables->lastPage()) }}">Last</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
