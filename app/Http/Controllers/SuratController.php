<?php
namespace App\Http\Controllers;

use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    // Method untuk menampilkan data surat
    public function index()
    {
        // Ambil semua data dari tabel 'surats'
        $surats = Surat::all();

        // Kirim data ke view 'surat.index'
        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        return view('surat.form');
    }

    // Menyimpan data dari form dan menampilkan template surat
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nomer_surat' => 'required|string|max:255',
            'divisi_dari' => 'required|string|max:255',
            'divisi_tujuan' => 'required|string|max:255',
            'dasar_pengajuan' => 'required|string',
            'no_pengajuan' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Menyimpan data ke dalam tabel surats
        $surat = Surat::create([
            'nomer_surat' => $validated['nomer_surat'],
            'divisi_dari' => $validated['divisi_dari'],
            'divisi_tujuan' => $validated['divisi_tujuan'],
            'dasar_pengajuan' => $validated['dasar_pengajuan'],
            'no_pengajuan' => $validated['no_pengajuan'],
            'item_diajukan' => $validated['item'],
            'jumlah' => $validated['jumlah'],
            'harga' => $validated['harga'],
            'total' => $validated['total'],
            'status' => 'pengajuan', // Set status default sebagai pengajuan
        ]);

        // Tampilkan template surat sebelum mengenerate PDF
        return view('surat.template', compact('surat'));
    }

    public function updateStatus($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Toggle status antara 'acc' dan 'tidak'
        if ($surat->status === 'pengajuan') {
            $surat->status = 'acc';
        } elseif ($surat->status === 'acc') {
            $surat->status = 'tidak';
        } else {
            $surat->status = 'pengajuan';
        }

        // Simpan perubahan status
        $surat->save();

        // Redirect kembali ke halaman daftar surat
        return redirect()->route('surat.index');
    }

    // Generate PDF
    public function generatePDF($id)
    {
        // Ambil data surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Generate PDF berdasarkan view 'surat.pdf'
        $pdf = Pdf::loadView('surat.template', compact('surat'))->setPaper('a4', 'portrait');

        // Return PDF untuk di-download
        return $pdf->download('surat-' . $surat->nomer_surat . '.pdf');
    }
}
