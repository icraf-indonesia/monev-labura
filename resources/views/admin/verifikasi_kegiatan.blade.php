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
                        <li><a href="{{url('')}}/admin">Manajemen Target Indikator Dampak</a></li>
                        <li><a href="{{url('')}}/admin/kegiatan">Manajemen Target Kegiatan</a></li>
                        <li><a href="{{url('')}}/admin/indikator/verifikasi">Verifikasi Input Indikator Dampak</a></li>
                        <li class="active"><a href="{{url('')}}/admin/kegiatan/verifikasi">Verifikasi Input Kegiatan</a></li>
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
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Indikator Keluaran</th>
                                            <th>Pelaksana</th>
                                            <th>Sumber Pendanaan</th>
                                            <th>Tahun</th>
                                            <th>Capaian</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($submissions as $index => $submission)
                                        <tr>
                                            <td width="1%">{{ $index + 1 }}</td>
                                            <td width="10%">{{ $submission->program }}</td>
                                            <td width="1%">{{ $submission->kegiatan }}</td>
                                            <td width="1%">{{ $submission->subkegiatan }}</td>
                                            <td width="1%">{{ $submission->indikator_keluaran }}</td>
                                            <td width="1%">{{ $submission->pelaksana }}</td>
                                            <td width="1%">{{ $submission->sumber_pembiayaan }}</td>
                                            <td width="1%">{{ $submission->tahun }}</td>
                                            <td width="1%">{{ $submission->capaian }}</td>
                                            <td width="1%">{{ $submission->status }}</td>
                                            <td width="1%">
                                                @if($submission->status_code == 0) <!-- Only show actions for pending -->
                                                <form action="{{ route('admin.kegiatan.approve', $submission->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success" onclick="return confirm('Approve data ini?')">Diverifikasi</button>
                                                </form>
                                                <form action="{{ route('admin.kegiatan.reject', $submission->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Revisi data ini?')">Revisi</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br />
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $submissions->url(1) }}">First</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $submissions->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">{{ $submissions->currentPage() }}</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $submissions->nextPageUrl() }}">Next</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $submissions->url($submissions->lastPage()) }}">Last</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
