@extends('layouts.main')
@section('title', 'Form Add Pasien')
@section('artikel')
<div class="card">
    <div class="card-header">Form Tambah Pasien</div>
    <div class="card-body">
        <form action="/save" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Usia</label>
                <input type="number" name="usia" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Diagnosis</label>
                <input type="file" name="diagnosis" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
