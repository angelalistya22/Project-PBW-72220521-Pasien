@extends('layouts.main')
@section('title', 'Form Ubah Password')
@section('artikel')
@if(@session('info'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('info') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<form action="/updateuser" method="post">
@csrf
<div class="form-group">
    <label>Password Baru</label>
    <input type="password" name="password_baru" class="formcontrol" required>
</div>
<div class="form-group">
    <label>Konfirmasi Password Baru</label>
    <input type="password" name="konfirmasi_password" class="form-control" required>
</div>
<div class="form-group">
    <button type="submit" class="btn btnprimary">Update</button>
</div>
</form>
@endsection