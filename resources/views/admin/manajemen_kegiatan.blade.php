@extends('header')

@section('page_title', 'Kelola Target')

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
                        <li><a href="{{url('')}}/admin">Manajemen Target Indikator Dampak</a></li>
                        <li class="active"><a href="{{url('')}}/admin/kegiatan">Manajemen Target Kegiatan</a></li>
                        <li><a href="{{url('')}}/admin/indikator/verifikasi">Verifikasi Input Indikator Dampak</a></li>
                        <li><a href="{{url('')}}/admin/kegiatan/verifikasi">Verifikasi Input Kegiatan</a></li>
                        <li><a href="{{url('')}}/admin/tambah-kegiatan">Tambah Kegiatan</a></li>
                    </ul>
                    
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="row">
                            <form method='get' action="{{ url('') }}/admin/kegiatan">
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="kata" 
                                           placeholder="Temukan..." value="{{ request('kata') }}">
                                </div>
                                <div class="col-md-3" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="btn btn-primary" type="submit" value="Telusuri">
                                    @if(request('kata'))
                                        <a href="{{ url('') }}/admin/kegiatan" class="btn btn-secondary" style="background: tomato;">Bersihkan</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        {{-- tab daftar target --}}
                        <div class="tab-pane active" id="daftar-target">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-bordered table-striped"
                                    style="width:100%; border:0; font-size:12;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Indikator Keluaran</th>
                                            <th>Satuan</th>
                                            <th>Waktu Pelaksanaan</th>
                                            <th>Lembaga Penanggung Jawab</th>
                                            <th>Target</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatans as $k)
                                            <tr>
                                                <td width="1%">
                                                    {{ ($kegiatans->currentPage() - 1) * $kegiatans->perPage() + $loop->iteration }}
                                                </td>
                                                <td width="10%">{{ $k->program }}</td>
                                                <td width="10%">{{ $k->kegiatan }}</td>
                                                <td width="10%">{{ $k->subkegiatan }}</td>
                                                <td width="10%">{{ $k->indikator_keluaran }}</td>
                                                <td width="10%">{{ $k->satuan }}</td>
                                                <td width="10%">{{ $k->tahun }}</td>
                                                <td width="10%">{{ $k->instansi }}</td>
                                                <td width="1%">{{ $k->target }}</td>
                                                <td width="2%">
                                                    <a class="custom-badge status-green bg-success text-right" href="/admin/kegiatan/{{ $k->id }}/edit">Ubah</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br />
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $kegiatans->appends(['kata' => request('kata')])->url($kegiatans->onFirstPage()) }}">First</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $kegiatans->appends(['kata' => request('kata')])->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">{{ $kegiatans->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $kegiatans->appends(['kata' => request('kata')])->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $kegiatans->appends(['kata' => request('kata')])->url($kegiatans->lastPage()) }}">Last</a></li>
                                </ul>
                            </nav>
                        </div>
                        {{-- tambah-target --}}
                        <div class="tab-pane" id="tambah-target">
                            <form class="page-box">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Komponen</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="strategi" id="strategi">
                                            <option value="">== Pilih Komponen ==</option>
                                            {{-- @foreach ($strategi as $s)
                                                <option value="{{$s->id}}">{{$s->strategi}}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>komponen</b> yang sesuai</span>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="indikator" id="indikator">
                                            <option value="">== Pilih Indikator ==</option>
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>indikator</b> yang sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tahun</label>
                                    <div class="col-lg-9">
                                        <input name="website_name" class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="website_name" class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Satuan</label>
                                    <div class="col-lg-9">
                                        <input name="keywords" class="form-control" placeholder="" type="text">
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
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
