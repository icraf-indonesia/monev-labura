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
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane active" id="add-kegiatan">
                            <form class="page-box" method="post" action="{{ route('admin.kegiatan.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Komponen</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="komponen" id="komponen">
                                            <option value="">== Pilih Komponen ==</option>
                                            @foreach ($komponens as $komponen)
                                                <option value="{{ $komponen->id }}">{{ $komponen->komponen }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>komponen</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Program</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="program" id="program" disabled>
                                            <option value="">== Pilih Program ==</option>
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>program</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kegiatan</label>
                                    <div class="col-lg-4">
                                        <select class="form-control select" name="kegiatan" id="kegiatan" disabled>
                                            <option value="">== Pilih Kegiatan ==</option>
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>kegiatan</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Subkegiatan</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="subkegiatan" id="subkegiatan" disabled>
                                            <option value="">== Pilih Sub Kegiatan ==</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator Keluaran</label>
                                    <div class="col-lg-9">
                                        <input name="indikator_keluaran" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Satuan</label>
                                    <div class="col-lg-9">
                                        <input name="satuan" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tahun</label>
                                    <div class="col-lg-9">
                                        <input name="tahun"
                                            class="date-own form-control @error('tahun') is-invalid @enderror"
                                            placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Lembaga Penanggung Jawab</label>
                                    <div class="col-lg-9">
                                        <select name="lembaga_penanggung_jawab" id="lembaga_penanggung_jawab"
                                            class="form-control">
                                            <option value="">== Pilih Lembaga ==</option>
                                            @foreach ($instansis as $instansi)
                                                <option value="{{ $instansi->instansi }}">{{ $instansi->instansi }}</option>
                                            @endforeach
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                        <div id="other_lembaga_container" style="display: none; margin-top: 10px;">
                                            <input type="text" name="other_lembaga" id="other_lembaga"
                                                class="form-control" placeholder="Masukkan nama lembaga">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="target_volume" class="form-control" type="number" value="">
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
        rel="stylesheet">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#komponen').change(function() {
                var komponenId = $(this).val();
                if (komponenId) {
                    $('#program').empty().append('<option value="">== Pilih Program ==</option>').prop(
                        'disabled', false);
                    $('#kegiatan').empty().append('<option value="">== Pilih Kegiatan ==</option>').prop(
                        'disabled', true);
                    $('#subkegiatan').empty().append('<option value="">== Pilih Sub Kegiatan ==</option>')
                        .prop('disabled', true);

                    $.get('/admin/get-programs/' + komponenId, function(data) {
                        $.each(data, function(key, value) {
                            $('#program').append('<option value="' + value.id + '">' + value
                                .program + '</option>');
                        });
                    });
                } else {
                    $('#program, #kegiatan, #subkegiatan').empty().append(
                        '<option value="">== Pilih ==</option>').prop('disabled', true);
                }
            });

            $('#program').change(function() {
                var programId = $(this).val();
                if (programId) {
                    $('#kegiatan').empty().append('<option value="">== Pilih Kegiatan ==</option>').prop(
                        'disabled', false);
                    $('#subkegiatan').empty().append('<option value="">== Pilih Sub Kegiatan ==</option>')
                        .prop('disabled', true);

                    $.get('/admin/get-kegiatans/' + programId, function(data) {
                        $.each(data, function(key, value) {
                            $('#kegiatan').append('<option value="' + value.id + '">' +
                                value.kegiatan + '</option>');
                        });
                    });
                } else {
                    $('#kegiatan, #subkegiatan').empty().append('<option value="">== Pilih ==</option>')
                        .prop('disabled', true);
                }
            });

            $('#kegiatan').change(function() {
                var kegiatanId = $(this).val();
                if (kegiatanId) {
                    $('#subkegiatan').empty().append('<option value="">== Pilih Sub Kegiatan ==</option>')
                        .prop('disabled', false);

                    $.get('/admin/get-subkegiatans/' + kegiatanId, function(data) {
                        $.each(data, function(key, value) {
                            $('#subkegiatan').append('<option value="' + value.id + '">' +
                                value.subkegiatan + '</option>');
                        });
                    });
                } else {
                    $('#subkegiatan').empty().append('<option value="">== Pilih ==</option>').prop(
                        'disabled', true);
                }
            });

            // Initialize datepicker
            $('.date-own').datetimepicker({
                viewMode: 'years',
                format: 'YYYY'
            });

            $('#lembaga_penanggung_jawab').change(function() {
                if ($(this).val() === 'lainnya') {
                    $('#other_lembaga_container').show();
                    $('#other_lembaga').prop('required', true);
                } else {
                    $('#other_lembaga_container').hide();
                    $('#other_lembaga').prop('required', false);
                }
            });

            // Initialize the state on page load
            if ($('#lembaga_penanggung_jawab').val() === 'lainnya') {
                $('#other_lembaga_container').show();
            }
        });
    </script>
@stop
