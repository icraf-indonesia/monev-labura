@extends('header')

@section('page_title', 'Tambah Capaian')

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
                        <li><a href="{{ url('') }}/kontributor/kegiatan">Daftar Kegiatan</a></li>
                        <li><a href="{{ url('') }}/kontributor/indikator/tambah">Input Capaian Indikator Dampak</a></li>
                        <li class="active"><a href="{{ url('') }}/kontributor/kegiatan/tambah">Input Capaian Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">

                        {{-- tab insert capaian  --}}
                        <div class="tab-pane active" id="tambah-capaian">
                            <form class="page-box" method="post" action="/kontributor/store_kegiatan"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator Keluaran</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="indikator" id="indikator">
                                            <option value="">== Pilih Indikator Keluaran ==</option>
                                            @foreach ($inputkegiatan_tables as $inputkegiatan_table)
                                                <option value="{{ $inputkegiatan_table->id }}">
                                                    {{ $inputkegiatan_table->indikator_keluaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted" style="font-size: 12px">Pilih salah satu <b>Indikator Keluaran</b> yang sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Komponen</label>
                                    <div class="col-lg-9">
                                        <input name="komponen" class="form-control" placeholder="" type="text" disabled
                                            id="komponen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Program</label>
                                    <div class="col-lg-9">
                                        <input name="program" class="form-control" placeholder="" type="text" disabled
                                            id="program">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kegiatan</label>
                                    <div class="col-lg-9">
                                        <input name="kegiatan" class="form-control" placeholder="" type="text" disabled
                                            id="kegiatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Subkegiatan</label>
                                    <div class="col-lg-9">
                                        <input name="subkegiatan" class="form-control" placeholder="" type="text" disabled
                                            id="subkegiatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Pelaksana</label>
                                    <div class="col-lg-9">
                                        <input name="pelaksana" class="form-control" placeholder="" type="text" disabled
                                            id="pelaksana">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Sumber Pendanaan</label>
                                    <div class="col-lg-9">
                                        <input name="sumber_pembiayaan" class="form-control" placeholder="" type="text" disabled
                                            id="sumber_pembiayaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="target" class="form-control" placeholder="" type="number" disabled
                                            id="target">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Satuan</label>
                                    <div class="col-lg-9">
                                        <input name="satuan" class="form-control" placeholder="" type="text" disabled
                                            id="satuan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tahun</label>
                                    <div class="col-lg-9">
                                        <input name="tahun" class="date-own form-control @error('tahun') is-invalid @enderror" placeholder="" type="text">
                                        <span class="form-text text-muted" style="font-size: 12px;">Pilih <b>tahun</b> penginputan capaian</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Capaian</label>
                                    <div class="col-lg-9">
                                        <input name="capaian" class="form-control" placeholder="" type="number" id="capaian">
                                        <span class="form-text text-muted" style="font-size: 12px;">Masukkan <b>capaian</b> saat ini dengan angka tanpa satuan</span>
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
@stop

@section('customJSLibrary')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
        rel="stylesheet">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
@stop

@section('customJS')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $.get('/get-kegiatan', function(data) {
        let dropdown = $('#indikator');
        dropdown.empty();
        dropdown.append('<option value="">== Pilih Indikator Keluaran ==</option>');
        
        $.each(data, function(index, kegiatan) {
            dropdown.append(`<option value="${kegiatan.id}">${kegiatan.indikator_keluaran}</option>`);
        });
    });

    $('#indikator').change(function() {
        var indikatorId = $(this).val();

        if (indikatorId) {
            $.ajax({
                url: '{{ url("get-indikator-detail") }}',
                type: 'GET',
                data: { id: indikatorId },
                success: function(response) {
                    if (response) {
                        $('#komponen').val(response.komponen);
                        $('#program').val(response.program);
                        $('#kegiatan').val(response.kegiatan);
                        $('#subkegiatan').val(response.subkegiatan);
                        $('#target').val(response.target);
                        $('#satuan').val(response.satuan);
                        $('#sumber_pembiayaan').val(response.sumber_pembiayaan);
                        $('#pelaksana').val(response.instansi);
                    }
                }
            });
        }
    });
});

// Initialize datepicker for Tahun input
$('.date-own').datetimepicker({
        viewMode: 'years',
        format: 'YYYY'
    });
</script>
@stop
