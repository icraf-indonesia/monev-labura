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
                        <li class="active"><a href="{{ url('') }}/kontributor/indikator/tambah">Input Indikator
                                Dampak</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan">Pelaksanaan Kegiatan</a></li>
                        <li><a href="{{ url('') }}/kontributor/kegiatan/tambah">Daftar Input Kegiatan</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">

                        {{-- tab insert capaian  --}}
                        <div class="tab-pane active" id="tambah-capaian">
                            <form class="page-box" method="post" action="/kontributor/store_indikator"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Indikator Dampak</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="indikator" id="indikator">
                                            <option value="">== Pilih Indikator ==</option>
                                            @foreach ($inputindikator_tables as $inputindikator_table)
                                                <option value="{{ $inputindikator_table->id }}">{{ $inputindikator_table->indikator }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Pilih salah satu <b>indikator</b> yang
                                            sesuai</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Target</label>
                                    <div class="col-lg-9">
                                        <input name="target" class="form-control" placeholder="" type="text" disabled
                                            id="target">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tahun</label>
                                    <div class="col-lg-9">
                                        <input name="tahun" class="date-own form-control @error('tahun') is-invalid @enderror" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Capaian Indikator</label>
                                    <div class="col-lg-9">
                                        <input name="capaian" class="form-control @error('capaian') is-invalid @enderror"
                                            placeholder="" type="text">
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
                                    <label class="col-lg-3 col-form-label">Upload Dokumen</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('dokumen') is-invalid @enderror" type="file"
                                            name="dokumen">
                                        <span class="form-text text-muted" id="dokumenPendukung">Catatan:</span><span
                                            class="form-text text-muted"> (Ukuran file max. 5 mb)</span>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Tambah</button>
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
    $(document).ready(function() {
        $('select[name="indikator"]').on('change', function() {
            var indikatorID = $(this).val();
            if (indikatorID) {
                $.ajax({
                    url: '/satuan/' + indikatorID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Assuming the response is an object with 'satuan' and 'target' keys
                        if (data.satuan && data.target) {
                            $('#satuan').val(data.satuan); // Set the value of the 'satuan' input field
                            $('#target').val(data.target); // Set the value of the 'target' input field
                        } else {
                            $('#satuan').val(''); // Clear the 'satuan' input field if no data
                            $('#target').val(''); // Clear the 'target' input field if no data
                        }
                    }
                });
            } else {
                $('#satuan').val(''); // Clear the 'satuan' input field if no indikator is selected
                $('#target').val(''); // Clear the 'target' input field if no indikator is selected
            }
        });
    });

    $('.date-own').datetimepicker({
    viewMode: 'years',
    format: 'YYYY'
    });

    function getFormattedDate(date) {
    var year1 = date.getFullYear();
    var year2 = date.getFullYear() + 1;
    return year1 + '-' + year2;
    }
@stop
