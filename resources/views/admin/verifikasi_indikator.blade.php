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
                        <li><a href="{{ url('') }}/admin">Manajemen Target Indikator</a></li>
                        <li class="active"><a href="{{ url('') }}/admin/indikator/verifikasi">Verifikasi Input
                                Indikator</a></li>
                        <li><a href="{{ url('') }}/admin/kegiatan">Manajemen Target Kegiatan</a></li>
                        <li><a href="{{ url('') }}/admin/kegiatan/verifikasi">Verifikasi Input Kegiatan</a></li>
                        <li><a href="{{ url('') }}/admin/tambah-kegiatan">Tambah Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        {{-- tab verifikasi indikator --}}
                        <div class="tab-pane active" id="verifikasi-capaian">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-bordered table-striped"
                                    style="width:100%; border:0; font-size:12;">
                                    <!-- Table headers -->
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Indikator</th>
                                            <th>Tahun</th>
                                            <th>Target</th>
                                            <th>Capaian</th>
                                            <th>Satuan</th>
                                            <th>Dokumen Terunggah</th>
                                            <th>Status</th>
                                            <th>Diinput oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($submissions as $index => $submission)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $submission->indikator }}</td>
                                                <td>{{ $submission->tahun }}</td>
                                                <td>{{ $submission->target }}</td>
                                                <td>{{ $submission->capaian }}</td>
                                                <td>{{ $submission->satuan }}</td>
                                                <td>
                                                    @if ($submission->dokumen_pendukung)
                                                        <a href="{{ route('view.document', basename($submission->dokumen_pendukung)) }}"
                                                            target="_blank" style="color:steelblue">
                                                            Lihat Dokumen
                                                        </a>
                                                    @else
                                                        No Document
                                                    @endif
                                                </td>
                                                <td>{{ $submission->status }}</td>
                                                <td>{{ $submission->diverifikasi_oleh ?? '-' }}</td>
                                                <td>
                                                    @if ($submission->status_code == 0)
                                                        <!-- Only show actions for pending -->
                                                        <form action="{{ route('admin.approve', $submission->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success"
                                                                onclick="return confirm('Approve data ini?')">Diverifikasi</button>
                                                        </form>
                                                        <form action="{{ route('admin.reject', $submission->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Revisi data ini?')">Revisi</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $submissions->links() }} <!-- Pagination links -->
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
