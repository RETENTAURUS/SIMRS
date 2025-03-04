<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function tambah()
    {
        $pengajuans = Pengajuan::where('jenis', 'penambahan')->get();
        return view('tambah', ['pengajuans' => $pengajuans]);
// Mengarahkan ke view pengajuan.tambah
    }

    public function ubah()
    {
        $pengajuans = Pengajuan::where('jenis', 'perubahan')->get();
        return view('ubah', ['pengajuans' => $pengajuans]);
// Mengarahkan ke view pengajuan.tambah
    }

    public function hapus()
    {
        $pengajuans = Pengajuan::where('jenis', 'penghapusan')->get();
        return view('hapus', ['pengajuans' => $pengajuans]);
// Mengarahkan ke view pengajuan.tambah
    }

    public function daftar()
    {
        $pengajuans = Pengajuan::all(); // Mengambil semua data pengajuan
        return view('daftar', ['pengajuans' => $pengajuans]);
// Mengarahkan ke view pengajuan.tambah
    }

    public function dashboardA()
    {
        $pengajuans = Pengajuan::all(); // Mengambil semua data pengajuan
        return view('dashboardA', ['pengajuans' => $pengajuans]);
// Mengarahkan ke view pengajuan.tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'jenis' => 'required|string',
            'dasar' => 'required|string',
            'urgensi' => 'required|string',
            'perubahan' => 'required|string',
            'instalasi' => 'required|string',
            'pemohon' => 'required|string',
            'kepala_instalasi' => 'nullable|string',
            'kontak' => 'required|string',
        ]);

        Pengajuan::create($request->all());

        return redirect('/')->with('success', 'Pengajuan berhasil dikirim!');
    }

    public function updateStatus($id, Request $request)
    {
        $pengajuan = Pengajuan::find($id);
    
        if (!$pengajuan) {
            return redirect()->route('daftar')->with('error', 'Pengajuan tidak ditemukan.');
        }
    
        // Validasi input status
        $request->validate([
            'status' => 'required|in:sedang dikerjakan,diajukan,ditolak,selesai',
        ]);
    
        // Update status pengajuan
        $pengajuan->status = $request->status;
        $saved = $pengajuan->save();
    
        if ($saved) {
            return redirect()->route('daftar')->with('success', 'Status pengajuan berhasil diperbarui!');
        } else {
            return redirect()->route('daftar')->with('error', 'Gagal memperbarui status pengajuan.');
        }
    }

    public function viewReport($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('report.report', compact('pengajuan'));
    }

}

