@extends('header')

@section('page_title', 'Daftar Capaian')

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
                        <li class="active"><a href="{{url('')}}/beranda/pelaksanaan">Pelaksanaan Rencana Aksi</a></li>
                        <li class="active"><a href="{{url('')}}/beranda/monitoring">Monitoring Rencana Aksi</a></li>
                        <li class="active"><a href="{{url('')}}/beranda/dampak">Monitoring Dampak</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="row">
                            <form method='get'>
                                <div class="col-md-2">
                                    <select class="form-control select" name="tahun" style="margin-bottom: 10px;" onchange="this.form.submit()">
                                        {{-- @foreach ($tahun as $p) --}}
                                            <option>Komponen 1</option>
                                            <option>Komponen 2</option>
                                            <option>Komponen 3</option>
                                            <option>Komponen 4</option>
                                            <option>Komponen 5</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                            </form>
                            <form method='get' action="{{url('')}}/kontributor">
                                <div class="col-md-2">
                                    <input class="form-control" type="text" name="kata" placeholder="Ketik disini.." value="{{ old('kata') }}">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="form-control" type="submit" value="Temukan">
                                </div>
                            </form>
                        </div>
                        <div class="row" style="margin-right: -1px; margin-bottom:10px;">
                            <div class="col-md-11"></div>
                            {{-- <div class="col-md-1">
                                <a href="{{url('')}}/kontributor/export" class="btn btn-primary" target="_blank">
                                    Unduh Data
                                </a>
                            </div> --}}
                        </div>
                        <div class="tab-pane active" id="daftar-capaian">
                                <div class="table-responsive">
                                    <table id="tabel-data" class="table table-bordered table-striped"
                                        style="width:100%; border:0; font-size:12;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Subkegiatan</th>
                                                <th>Indikator Keluaran</th>
                                                <th>% (2020) (Sem 1)</th>
                                                <th>Kategori (2020) (Sem 1)</th>
                                                <th>Nilai (2020) (Sem 1)</th>
                                                <th>% (2020) (Sem 2)</th>
                                                <th>Kategori (2020) (Sem 2)</th>
                                                <th>Nilai (2020) (Sem 2)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($tables))
                                                @foreach ($tables as $table)
                                                    <tr>
                                                        <td width="1%">{{ (($tables->currentPage() * 10) - 10) + $loop->iteration }}</td>
                                                        <td width="10%">{{ $table->indikator }}</td>
                                                        <td width="1%">{{ $table->tahun }}</td>
                                                        <td width="1%">{{ $table->target }}</td>
                                                        <td width="2%">{{ $table->capaian }}</td>
                                                        <td width="2%">{{ $table->satuan }}</td>
                                                        @if (empty($table->dokumen))
                                                            <td width="2%">Belum ada dokumen</td>
                                                        @else
                                                            <td width="2%"><a href="{{url('/dokumen/'.$table->dokumen)}}" target="_blank">{{$table->dokumen}}</a></td>
                                                        @endif
                                                        <td width="1%">
                                                            @if($table->status === 0)
                                                                <span class="badge rounded-pill" style="background-color: #0d6efd !important;color: #fff;">Menunggu</span>
                                                            @elseif($table->status === 1)
                                                                <span class="badge rounded-pill" style="background-color: #198754 !important;color: #fff;">Diterima</span>
                                                            @else
                                                                <a class="custom-badge status-green text-right" href="/kontributor/capaian/{{ $table->id }}">
                                                                    Revisi
                                                                </a>
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
                                            @endif --}}
                                        </tbody>
                                    </table>
                                </div>
                                <br />
                                {{-- <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="{{ $tables->url($tables->onFirstPage()) }}">First</a></li>
                                        <li class="page-item"><a class="page-link" href="{{ $tables->previousPageUrl() }}">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">{{ $tables->currentPage() }}</a></li>
                                        <li class="page-item"><a class="page-link" href="{{ $tables->nextPageUrl() }}">Next</a></li>
                                        <li class="page-item"><a class="page-link" href="{{ $tables->url($tables->lastPage()) }}">Last</a></li>
                                    </ul>
                                </nav> --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


