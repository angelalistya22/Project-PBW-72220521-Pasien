@extends('layouts.main')
@section('title', 'Form Edit Pasien')
@section('artikel')
<div class="card">
    <div class="card-header">Form Edit Pasien</div>
    <div class="card-body">
        <form action="/update/{{ $ps->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $ps->nama }} required>
            </div>
            <div class="form-group">
                <label>Usia</label>
                <input type="number" name="usia" class="form-control" value="{{ $ps->usia }}" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="L" {{ ($ps->gender == "L") ? "Selected":"" }}>Laki-laki</option>
                    <option value="P" {{ ($ps->gender == "P") ? "Selected":"" }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Diagnosis</label>
                <input type="file" name="diagnosis" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <img src="{{ asset('storage/'.$ps->diagnosis) }}" alt="{{ $ps->diagnosis }}" width="80" height="80">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
