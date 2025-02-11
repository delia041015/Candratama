@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Project Progress</h1>
    <a href="{{ route('project_progress.create') }}" class="btn btn-primary">Tambah Progress</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Klien</th>
                <th>Alamat</th>
                <th>Project</th>
                <th>Tanggal Setting</th>
                <th>Teknisi</th>
                <th>Dokumentasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progress as $p)
            <tr>
                <td>{{ $p->omset->nama_klien }}</td>
                <td>{{ $p->omset->alamat }}</td>
                <td>{{ $p->omset->project }}</td>
                <td>{{ $p->tgl_setting }}</td>
                <td>{{ $p->teknisi->name }}</td>
                <td>
                    @if($p->dokumentasi)
                        <img src="{{ asset('storage/' . $p->dokumentasi) }}" width="100">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('project_progress.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('project_progress.destroy', $p->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
