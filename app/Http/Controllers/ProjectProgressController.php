<?php


namespace App\Http\Controllers;

use App\Models\ProjectProgress;
use App\Models\Omset;
use App\Models\User1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\Debugbar\Facade as Debugbar;

class ProjectProgressController extends Controller
{
    public function index()
    {
        // Ambil semua data project progress dengan relasi omset dan teknisi
        $progress = ProjectProgress::with('omset', 'teknisi')->get();
        return view('project_progress.index', compact('progress'));
    }

    public function create()
    {
        // Ambil semua data omset dan teknisi untuk form
        $omset = Omset::all();
        $teknisi = User1::where('role', 'teknisi')->get();
        return view('project_progress.create', compact('omset', 'teknisi'));
    }

    public function store(Request $request)
    {
        
        // Validasi input dari form
        $validated = $request->validate([
            'omset_id' => 'required|exists:omsets,id_omset', // Validasi omset_id harus ada di tabel omsets
            'teknisi_id' => 'required|exists:users,id_user', // Validasi teknisi_id harus ada di tabel users
            'tgl_setting' => 'required|date', // Pastikan tgl_setting adalah tanggal valid
            'dokumentasi' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // Validasi file jika ada
        ]);

        // Debug: Log data setelah validasi berhasil
        Debugbar::info('Validated Data:', $validated);

        // Simpan file dokumentasi jika ada
        $dokumentasiPath = null;
        if ($request->hasFile('dokumentasi')) {
            $dokumentasiPath = $request->file('dokumentasi')->store('public/dokumentasi');
            Debugbar::info('Dokumentasi path:', $dokumentasiPath);
        }

        // Simpan data ke database
        ProjectProgress::create([
            'omset_id' => $validated['omset_id'],
            'teknisi_id' => $validated['teknisi_id'],
            'tgl_setting' => $validated['tgl_setting'],
            'dokumentasi' => $dokumentasiPath,
            'status' => 'waitinglist', // Status default
        ]);

        // Redirect setelah sukses
        return redirect()->route('project_progress.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        ProjectProgress::destroy($id);
        return redirect()->route('project_progress.index')->with('success', 'Project Progress berhasil dihapus!');
    }
}
