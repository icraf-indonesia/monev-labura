@extends('header')

@section('page_title', 'Daftar Capaian')

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
                        <li class="active"><a href="{{url('')}}/beranda/pelaksanaan">Pelaksanaan Rencana Aksi</a></li>
                        <li class="active"><a href="{{url('')}}/beranda/monitoring">Monitoring Rencana Aksi</a></li>
                        <li class="active"><a href="{{url('')}}/beranda/dampak">Monitoring Dampak</a></li>
                    </ul>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="row">
                            <form method='get'>
                                <div class="col-md-2">
                                    <select class="form-control select" name="tahun" style="margin-bottom: 10px;" onchange="this.form.submit()">
                                        {{-- @foreach ($tahun as $p) --}}
                                            <option>Komponen 1</option>
                                            <option>Komponen 2</option>
                                            <option>Komponen 3</option>
                                            <option>Komponen 4</option>
                                            <option>Komponen 5</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                            </form>
                            <form method='get' action="{{url('')}}/kontributor">
                                <div class="col-md-2">
                                    <input class="form-control" type="text" name="kata" placeholder="Ketik disini.." value="{{ old('kata') }}">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;margin-bottom: 10px;">
                                    <input class="form-control" type="submit" value="Temukan">
                                </div>
                            </form>
                        </div>
                        <div class="row" style="margin-right: -1px; margin-bottom:10px;">
                            <div class="col-md-11"></div>
                            {{-- <div class="col-md-1">
                                <a href="{{url('')}}/kontributor/export" class="btn btn-primary" target="_blank">
                                    Unduh Data
                                </a>
                            </div> --}}
                        </div>
                        <div class="tab-pane active" id="daftar-capaian">
                            {{-- <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart" style="min-height: 400px;">
                                            <canvas id="lineChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


