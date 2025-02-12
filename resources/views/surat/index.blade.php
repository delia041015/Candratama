@extends('layouts.app')

@section('content')
    <h1>Daftar Surat Pengajuan</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No.Surat</th>
                <th>Dari Divisi</th>
                <th>Ke Divisi</th>
                <th>No Pengajuan</th>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats as $surat)
                <tr>
                    <td>{{ $surat->nomer_surat }}</td>
                    <td>{{ $surat->divisi_dari }}</td>
                    <td>{{ $surat->divisi_tujuan }}</td>
                    <td>{{ $surat->no_pengajuan }}</td>
                    <td>{{ $surat->item_diajukan }}</td>
                    <td>{{ $surat->jumlah }}</td>
                    <td>Rp {{ number_format($surat->harga, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($surat->total, 2, ',', '.') }}</td>
                    <td>{{ $surat->status }} |
                        <a href="{{ route('surat.updateStatus', $surat->id) }}">Ubah Status</a></td>
                    <td>
                        <!-- Link untuk generate PDF -->
                        <a href="{{ route('surat.generatePDF', $surat->id) }}" target="_blank">Download PDF</a>

                        <!-- Link untuk update status surat -->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
