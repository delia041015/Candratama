@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Progress Project</h1>
        <form action="{{ route('progress_projects.update', $progressProject->id_progres) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_klien" class="form-label">Nama Klien</label>
                <input type="text" class="form-control" id="nama_klien" name="nama_klien" value="{{ $progressProject->nama_klien }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $progressProject->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <input type="text" class="form-control" id="project" name="project" value="{{ $progressProject->project }}" required>
            </div>

            <div class="mb-3">
                <label for="tgl_setting" class="form-label">Tanggal Setting</label>
                <input type="date" class="form-control" id="tgl_setting" name="tgl_setting" value="{{ $progressProject->tgl_setting }}" required>
            </div>

            <div class="mb-3">
                <label for="teknisi" class="form-label">Teknisi</label>
                <input type="text" class="form-control" id="teknisi" name="teknisi" value="{{ $progressProject->teknisi }}" required>
            </div>

            <div class="mb-3">
                <label for="dokumentasi" class="form-label">Dokumentasi (Opsional)</label>
                <input type="text" class="form-control" id="dokumentasi" name="dokumentasi" value="{{ $progressProject->dokumentasi }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('progress_projects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
