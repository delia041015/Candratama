@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Project Progress</h2>
    <form action="{{ route('project_progress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="omset_id" class="form-label">Nama Klien</label>
            <select id="omset_id" name="omset_id" class="form-control" required>
                <option value="" selected>Pilih Klien</option>
                @foreach ($omset as $o)
                    <option value="{{ $o->id }}">{{ $o->nama_klien }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="teknisi_id" class="form-label">Teknisi</label>
            <select id="teknisi_id" name="teknisi_id" class="form-control" required>
                <option value="" selected>Pilih Teknisi</option>
                @foreach ($teknisi as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_setting" class="form-label">Tanggal Setting</label>
            <input type="date" id="tgl_setting" name="tgl_setting" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Dokumentasi (Foto)</label>
            <input type="file" id="dokumentasi" name="dokumentasi" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
