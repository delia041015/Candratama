<div>
    <!-- Kop Surat -->
    <div style="display: flex; align-items: center; justify-content: center; padding: 10px;">
        <!-- Logo di kiri -->
        <img src="{{ asset('images/logocandratama.jpg') }}" alt="Logo Perusahaan"
            style="width: 100px; height: auto; margin-right: 20px;">

        <!-- Teks Perusahaan di sebelah kanan logo -->
        <div style="text-align: left;">
            <h2>Candratama Granite</h2>
            <p>Alamat Perusahaan: Jl. Tambora, Bandar Lor, Kec. Mojoroto, Kota Kediri, Jawa Timur.</p>
            <p>Telepon: 08113371733 | Email: candratamagranite@gmail.com</p>
        </div>
    </div>

    <hr style="border: 1px solid #000; width: 100%;"> <!-- Garis pemisah -->

    <!-- Judul Surat -->
    <h3 style="text-decoration: underline; text-align: center;">Surat Pengajuan Barang</h3>

    <!-- Kata Pengantar -->
    <p>Dengan hormat,</p>
    <p>Sehubungan dengan kebutuhan yang mendesak di divisi <strong>{{ $surat->divisi_dari }}</strong>, kami mengajukan permohonan untuk melakukan pengajuan barang dengan rincian sebagai berikut:</p>

    <!-- Detail Surat -->
    <p><strong>Nomor Surat:</strong> {{ $surat->nomer_surat }}</p>
    <p><strong>Dari Divisi:</strong> {{ $surat->divisi_dari }}</p>
    <p><strong>Ke Divisi:</strong> {{ $surat->divisi_tujuan }}</p>
    <p><strong>Dasar Pengajuan:</strong> {{ $surat->dasar_pengajuan }}</p>
    <p><strong>No Pengajuan:</strong> {{ $surat->no_pengajuan }}</p>
    <p><strong>Item yang Diajukan:</strong> {{ $surat->item_diajukan }}</p>
    <p><strong>Jumlah:</strong> {{ $surat->jumlah }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($surat->harga, 2, ',', '.') }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($surat->total, 2, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($surat->status) }}</p>

    <hr>

    <!-- Tanda Tangan -->
    <div style="display: flex; justify-content: space-between; margin-top: 50px;">
        <div>
            <p><strong>Mengetahui,</strong></p>
            <p>Divisi {{ $surat->divisi_dari }}</p>
            <br><br><br>
            <p>(Nama Penanggung Jawab)</p>
        </div>

        <div style="text-align: right;">
            <p><strong>Jakarta, {{ \Carbon\Carbon::now()->format('d M Y') }}</strong></p>
            <p><strong>Disetujui Oleh,</strong></p>
            <p>Divisi {{ $surat->divisi_tujuan }}</p>
            <br><br><br>
            <p>(Nama Penerima)</p>
        </div>
    </div>
</div>
