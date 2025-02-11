<?php

namespace App\Http\Controllers;

use App\Models\ProjectProgress;
use App\Models\Omset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectProgressController extends Controller
{
    public function index()
    {
        $progress = ProjectProgress::with('omset', 'teknisi')->get();
        return view('project_progress.index', compact('progress'));
    }

    public function create()
    {
        $omset = Omset::all();
        $teknisi = User::where('role', 'teknisi')->get();
        return view('project_progress.create', compact('omset', 'teknisi'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        // Validasi input dari form
        $request->validate([
            'omset_id' => 'required|exists:omsets,id', // Validasi omset_id
            'teknisi_id' => 'required|exists:teknisis,id', // Validasi teknisi_id
            'tgl_setting' => 'required|date',
            'dokumentasi' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // Validasi file
        ]);
    
        // Debug: Periksa data yang dikirimkan
        Log::debug(message: 'Omset ID: ' . $request->input('omset_id'));  // Menggunakan input() daripada langsung akses property
        Log::debug(message: 'Teknisi ID: ' . $request->input('teknisi_id'));  // Menggunakan input() daripada langsung akses property
        Log::debug(message: 'Tgl Setting: ' . $request->input('tgl_setting'));  // Menggunakan input() daripada langsung akses property

        // Cek apakah file dokumentasi ada dan ambil nama asli file
        if ($request->hasFile('dokumentasi')) {
            Log::debug(message: 'Dokumentasi: ' . $request->file('dokumentasi')->getClientOriginalName());
        }
    
        // Menyimpan file dokumentasi jika ada
        $dokumentasiPath = null;
        if ($request->hasFile('dokumentasi')) {
            $dokumentasiPath = $request->file('dokumentasi')->store('public/dokumentasi');
        }
    
        // Menyimpan data progress project ke database
        ProjectProgress::create([
            'omset_id' => $request->input('omset_id'),
            'teknisi_id' => $request->input('teknisi_id'),
            'tgl_setting' => $request->input('tgl_setting'),
            'dokumentasi' => $dokumentasiPath,
            'status' => 'pending',  // Anda bisa mengubah status sesuai kebutuhan
        ]);
    
        // Redirect setelah sukses
        return redirect()->route('project_progress.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        ProjectProgress::destroy($id);
        return redirect()->route('project_progress.index')->with('success', 'Project Progress berhasil dihapus!');
    }
}
