@extends('header')

@section('page_title', 'Revisi Capaian Kegiatan')

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
                        <li><a href="{{ route('kegiatan') }}">Kembali</a></li>
                        <li class="active"><a href="#edit-kegiatan" data-toggle="tab">Revisi Capaian Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane active" id="edit-kegiatan">
                            <form class="page-box" method="post" action="{{ route('kegiatan.update', $indikator_keluaran->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator</label>
                                    <div class="col-lg-9">
                                        <input name="indikator_keluaran" class="form-control" type="text" value="{{ $indikator_keluaran->indikator_keluaran }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Capaian</label>
                                    <div class="col-lg-9">
                                        <input name="target" class="form-control" type="text" value="{{ $indikator_keluaran->capaian }}" required>
                                        <span class="form-text text-muted">Masukkan <b>capaian</b> saat ini</span>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Simpan Perubahan</button>
                                    <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection