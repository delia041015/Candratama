
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Project Progress</h2>
    <form action="{{ route('project_progress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="omset_id" class="form-label">Nama Klien</label>
            <select id="omset_id" name="omsets_id" class="form-control" required>
                <option value=""selected>Pilih Klien</option>
                @foreach ($omset as $o)
                    <option value="{{ $o->id}}" data-alamat="{{ $o->alamat }}" data-project="{{ $o->project }}">{{ $o->nama_klien }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" id="alamat" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Project</label>
            <input type="text" id="project" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="tgl_setting" class="form-label">Tanggal Setting</label>
            <input type="date" id="tgl_setting" name="tgl_setting" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="teknisi_id" class="form-label">Teknisi</label>
            <select id="teknisi_id" name="teknisi_id" class="form-control" required>
                <option value=""selected>Pilih Teknisi</option>
                @foreach ($teknisi as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Dokumentasi (Foto)</label>
            <input type="file" id="dokumentasi" name="dokumentasi" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('project_progress.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
        document.getElementById('omset_id').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex];
        console.log('Omset ID: ', selected.value);  // Debug output
        document.getElementById('alamat').value = selected.getAttribute('data-alamat');
        document.getElementById('project').value = selected.getAttribute('data-project');
    });

    document.getElementById('teknisi_id').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex];
        console.log('Teknisi ID: ', selected.value);  // Debug output
    });
</script>
@endsection
