

@section('content')
    <head>
        <style>
            /* Menyembunyikan elemen-elemen yang tidak diinginkan di PDF */
            @media print {
                .navbar, .sidebar, .footer, .no-print {
                    display: none !important;
                }

                body {
                    margin: 0;
                    padding: 20px;
                }

                img {
                    width: 100px;
                    height: auto;
                }

                /* Membuat konten lebih rapi di PDF, dan sesuai dengan ukuran A4 */
                .surat-container {
                    display: flex;
                    flex-direction: column;
                    width: 21cm; /* Ukuran kertas A4 dalam cm */
                    margin: 0 auto;
                    font-family: Arial, sans-serif;
                    font-size: 12pt;
                }

                /* Pengaturan padding dan margin di PDF */
                h3, p {
                    margin: 0;
                    padding: 5px 0;
                }
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 14px;
            }

            .surat-container {
                display: flex;
                flex-direction: column;
                max-width: 21cm; /* Ukuran A4 */
                margin: 0 auto; /* Membuat konten berada di tengah */
                padding: 10px;
            }

            .surat-header {
                display: flex;
                justify-content: flex-start; /* Logo kiri dan teks di kanan */
                align-items: center;
            }

            .surat-header img {
                width: 100px;
                height: auto;
                margin-right: 20px;
            }

            .company-info {
                text-align: left;
            }

            .tanda-tangan {
                display: flex;
                justify-content: space-between;
                margin-top: 50px;
            }

            .tanda-tangan div {
                text-align: center;
                margin-top: 50px;
            }

            h3 {
                text-decoration: underline;
                text-align: center;
            }

            .surat-content {
                padding: 10px;
                margin-bottom: 50px;
            }

        </style>
    </head>

    <div class="surat-container">
        <!-- Kop Surat -->
        <div class="surat-header">
            <!-- Logo di kiri -->
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/logocandratama.jpg'))) }}" alt="Logo Perusahaan">

            <!-- Teks Perusahaan di sebelah kanan logo -->
            <div class="company-info">
                <h2>Candratama Granite</h2>
                <p>Alamat Perusahaan: Jl. Tambora, Bandar Lor, Kec. Mojoroto, Kota Kediri, Jawa Timur.</p>
                <p>Telepon: 08113371733 | Email: candratamagranite@gmail.com</p>
            </div>
        </div>

        <hr style="border: 1px solid #000; width: 100%;"> <!-- Garis pemisah -->

        <!-- Judul Surat -->
        <h3>Surat Pengajuan Barang</h3>

        <!-- Kata Pengantar -->
        <div class="surat-content">
            <p>Dengan hormat,</p>
            <p>Sehubungan dengan kebutuhan yang mendesak di divisi <strong>{{ $surat->divisi_dari }}</strong>, kami mengajukan
                permohonan untuk melakukan pengajuan barang dengan rincian sebagai berikut:</p>
        </div>

        <!-- Detail Surat -->
        <div class="surat-content">
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
        </div>

        <hr>

        <!-- Tanda Tangan -->
        <div class="tanda-tangan">
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

    <a href="{{ route('surat.generatePDF', $surat->id) }}" class="btn btn-primary no-print" target="_blank">Download PDF</a>

