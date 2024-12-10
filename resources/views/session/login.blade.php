@extends('no_layout')

@section('css')
<style>
/* Add custom styles for notifications, if needed */
.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
    color: #fff;
}
.alert-success {
    background-color: #4CAF50;
}
.alert-danger {
    background-color: #f44336;
}
</style>
@stop

@section('content')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <a class="web-logo1" href="{{url('')}}/" style="text-align: -webkit-center;">
        <img src="dist/assets/img/header-small.png" class="img-responsive" alt="">
    </a>
    <h3>Halaman Masuk</h3>

    <!-- Notifications -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif

    <form action="/session/login" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
        <input type="username" name="username" value="{{ Session::get('username') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3 d-grid m-t-20">
        <button name="submit" type="submit" class="btn btn-primary">Masuk</button>
    </div>
    </form>
</div>

@stop
