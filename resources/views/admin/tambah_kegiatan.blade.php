@extends('header')

@section('page_title', 'Ubah Target Kegiatan')

@section('content')
    <div class="row" style="max-width: 1000px; margin: auto;">
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
                        <li><a href="/admin">Kembali</a></li>
                        <li class="active"><a href="#add-kegiatan" data-toggle="tab">Tambah Kegiatan</a></li>
                        <li><a href="#upload-data" data-toggle="tab">Unggah Data Monitoring</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane active" id="add-kegiatan">
                            <form class="page-box" method="post" action="/admin/kegiatan/">
                                @csrf
                                {{-- @method('put') --}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Komponen</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="strategi" id="strategi">
                                            <option value="">== Pilih Komponen ==</option>
                                            {{-- @foreach ($strategi as $s)
                                                <option value="{{ $s->id }}">{{ $s->strategi }}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>komponen</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Program</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="strategi" id="strategi">
                                            <option value="">== Pilih Program ==</option>
                                            {{-- @foreach ($strategi as $s)
                                                <option value="{{ $s->id }}">{{ $s->strategi }}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>program</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kegiatan</label>
                                    <div class="col-lg-4">
                                        <select class="form-control select" name="strategi" id="strategi">
                                            <option value="">== Pilih Indikator ==</option>
                                            {{-- @foreach ($strategi as $s)
                                                <option value="{{ $s->id }}">{{ $s->strategi }}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>kegiatan</b> yang
                                            sesuai</span>
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="btn btn-primary submit-btn" type="submit">Add</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Sub Kegiatan</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Satuan</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Waktu</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Lembaga</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="upload-data">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Upload Dokumen</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file" name="dokumen">
                                    <span class="form-text text-muted" id="dokumenPendukung">Catatan:</span><span
                                        class="form-text text-muted"> (Ukuran file max. 5 mb)</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
