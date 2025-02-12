@extends('layouts.app')

@section('content')

<form action="{{ route('surat.store') }}" method="POST">

    @csrf
    <label for="nomer_surat">Nomor Surat:</label>
    <input type="text" id="nomer_surat" name="nomer_surat" required><br><br>

    <label for="divisi_dari">Dari Divisi:</label>
    <input type="text" id="divisi_dari" name="divisi_dari" required><br><br>

    <label for="divisi_tujuan">Ke Divisi:</label>
    <input type="text" id="divisi_tujuan" name="divisi_tujuan" required><br><br>

    <label for="dasar_pengajuan">Dasar Pengajuan:</label>
    <input type="text" id="dasar_pengajuan" name="dasar_pengajuan" required><br><br>

    <label for="no_pengajuan">No Pengajuan:</label>
    <input type="text" id="no_pengajuan" name="no_pengajuan" required><br><br>

    <label for="item">Item yang diajukan:</label>
    <input type="text" id="item" name="item" required><br><br>

    <label for="jumlah">Jumlah:</label>
    <input type="number" id="jumlah" name="jumlah" required><br><br>

    <label for="harga">Harga:</label>
    <input type="number" id="harga" name="harga" required><br><br>

    <label for="total">Total:</label>
    <input type="number" id="total" name="total" required><br><br>


    <button type="submit">Generate Surat</button>
</form>
@endsection
