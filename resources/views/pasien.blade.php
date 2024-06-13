@extends('layouts/main')
@section('title', 'Pasien')
@section('artikel')
    <div class="card">
        <div class="card-header">
            <a href="/pasien/add-form" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Pasien</a>
        </div>
        <div class="card-body">
            @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Gender</th>
                        <th>Diagnosis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ps as $idx => $p)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->usia }}</td>
                        <td>{{ $p->gender }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$p->diagnosis) }}" alt="{{ $p->diagnosis }}" width="80" height="80">
                            {{-- Debugging output --}}
                            <!-- <p>{{ 'storage/' . $p->diagnosis }}</p> -->
                        </td>
                        <td>
                            <a href="/pasien/edit-form/{{ $p->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="/delete/{{ $p->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
