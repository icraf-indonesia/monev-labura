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
                        <li class="active"><a href="{{url('')}}/admin/indikator/verifikasi">Verifikasi Input Indikator</a></li>
                        <li><a href="{{url('')}}/admin/kegiatan">Manajemen Target Kegiatan</a></li>
                        <li><a href="{{url('')}}/admin/kegiatan/verifikasi">Verifikasi Input Kegiatan</a></li>
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
                                            <th>Indikator</th>
                                            <th>Tahun</th>
                                            <th>Target</th>
                                            <th>Capaian</th>
                                            <th>Satuan</th>
                                            <th>Status</th>
                                            <th>Diverifikasi oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                            <tr>
                                                <td width="1%">1</td>
                                                <td width="10%">test</td>
                                                <td width="1%">test</td>
                                                <td width="1%">test</td>
                                                <td width="1%">test</td>
                                                <td width="1%">test</td>
                                                <td width="2%">
                                                    <span class="badge rounded-pill" style="background-color: #0d6efd !important; color: #fff;">Menunggu</span>
                                                    {{-- @if($c->status === 0)
                                                        <span class="badge rounded-pill" style="background-color: #0d6efd !important; color: #fff;">Menunggu</span>
                                                    @elseif($c->status === 1)
                                                        <span class="badge rounded-pill" style="background-color: #198754 !important; color: #fff;">Diverifikasi</span>
                                                    @else
                                                        <span class="badge rounded-pill" style="background-color: #dc3545 !important; color: #fff;">Dalam revisi</span>
                                                    @endif --}}
                                                </td>
                                                <td width="1%">Admin</td>
                                                <td width="6%">
                                                    {{-- @if($c->status == 0) --}}
                                                        <form action="/admin/capaian/verify/" method="post" class="d-inline" style="float: left; margin-right: 5px;">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="1" name="status">
                                                            <input type="hidden" value="" name="verified_by">
                                                            <button type="submit" class="custom-badge status-blue bg-primary" onclick="return confirm('Approve data ini?')">Approve</button>
                                                        </form>
                                                        <form action="/admin/capaian/reject/" method="post" class="d-inline">
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
