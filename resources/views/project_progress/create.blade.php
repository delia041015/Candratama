
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Project Progress</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('project_progress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <select id="omset_id" name="omset_id" class="form-control" required>
            <option value="" selected>Pilih Klien</option>
            @foreach ($omset as $o)
                <option value="{{ $o->id }}" data-alamat="{{ $o->alamat }}" data-project="{{ $o->project }}">
                    {{ $o->nama_klien }}
                </option>
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

    <input type="hidden" name="omset_id" id="hidden_omset_id">
    <input type="hidden" name="teknisi_id" id="hidden_teknisi_id">

    <script>
        document.getElementById('omset_id').addEventListener('change', function() {
            document.getElementById('hidden_omset_id').value = this.value;
        });

        document.getElementById('teknisi_id').addEventListener('change', function() {
            document.getElementById('hidden_teknisi_id').value = this.value;
        });
    </script>
<script>
        document.getElementById('omset_id').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex];
        document.getElementById('alamat').value = selected.getAttribute('data-alamat');
        document.getElementById('project').value = selected.getAttribute('data-project');
    });

    document.getElementById('omset_id').addEventListener('change', function() {
        console.log('Omset ID Terpilih:', this.value);
    });

    document.getElementById('teknisi_id').addEventListener('change', function() {
        console.log('Teknisi ID Terpilih:', this.value);
    });


</script>
@endsection
