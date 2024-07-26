@extends('no_layout')

@section('css')
<style>

</style>
@stop

@section('content')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <a class="web-logo1" href="{{url('')}}/" style="text-align: -webkit-center;"><img src="dist/assets/img/header-small.png" class="img-responsive" alt=""></a>
    <h3>Masuk</h3>
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
        <button name="submit" type="submit" class="btn btn-primary">Login</button>
    </div>
    </form>
</div>

@stop
