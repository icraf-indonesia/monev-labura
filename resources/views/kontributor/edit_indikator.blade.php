@extends('header')

@section('page_title', 'Revisi Indikator Dampak')

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
                        <li><a href="{{ route('kontributor') }}">Kembali</a></li>
                        <li class="active"><a href="#edit-indikator" data-toggle="tab">Revisi Indikator Dampak</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane active" id="edit-indikator">
                            <form class="page-box" method="post" action="{{ route('indikator.update', $indikator->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator</label>
                                    <div class="col-lg-9">
                                        <input name="indikator" class="form-control" type="text" value="{{ $indikator->indikator }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Capaian</label>
                                    <div class="col-lg-9">
                                        <input name="capaian" class="form-control" type="text" value="{{ $indikator->capaian }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dokumen Pendukung</label>
                                    <div class="col-lg-9">
                                        @if($indikator->dokumen_pendukung)
                                            <div class="mb-2">
                                                <a href="{{ asset('storage/'.$indikator->dokumen_pendukung) }}" target="_blank" class="btn btn-sm btn-info" style="font-size: small; margin-bottom: 10px;">
                                                    Lihat Dokumen Saat Ini
                                                </a>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="dokumen_pendukung">
                                        <small class="form-text text-muted">
                                            Format: PDF, DOC, DOCX, XLS, XLSX, ZIP (Max: 5MB)
                                        </small>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Simpan Perubahan</button>
                                    <a href="{{ route('kontributor') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection