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
                        <li><a href="/admin/kegiatan">Kembali</a></li>
                        <li class="active"><a href="#edit-target" data-toggle="tab">Ubah Target Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane active" id="edit-target">
                            <form class="page-box" method="post" action="/admin/kegiatan/{{ $kegiatan->id }}">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Program</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{ $kegiatan->program }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kegiatan</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="5" disabled>{{ $kegiatan->kegiatan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Subkegiatan</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="5" disabled>{{ $kegiatan->subkegiatan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator Keluaran</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="5" disabled>{{ $kegiatan->indikator_keluaran }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Satuan</label>
                                    <div class="col-lg-9">
                                        <input name="satuan" class="form-control @error('satuan') is-invalid @enderror" type="text" value="{{ $kegiatan->satuan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="target" class="form-control @error('target') is-invalid @enderror" type="text" value="{{ $kegiatan->target }}">
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection