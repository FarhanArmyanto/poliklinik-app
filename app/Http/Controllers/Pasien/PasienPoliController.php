<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Poli;
use App\Models\JadwalPeriksa;

class PasienPoliController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil semua data poli dan jadwal periksa
        $polis = Poli::all();
        $jadwals = JadwalPeriksa::with('dokter.poli')->get();

        // Kirim ke view
        return view('pasien.daftar', compact('user', 'polis', 'jadwals'));
    }

    public function submit(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'id_poli' => 'required|integer',
            'id_jadwal' => 'required|integer',
            'keluhan' => 'required|string|max:255',
        ]);

        // Simpan data (contoh, sesuaikan dengan model kamu)
        // PendaftaranPoli::create([
        //     'pasien_id' => Auth::id(),
        //     'poli_id' => $validated['id_poli'],
        //     'jadwal_id' => $validated['id_jadwal'],
        //     'keluhan' => $validated['keluhan'],
        // ]);

        return redirect()->route('pasien.dashboard')->with('success', 'Pendaftaran berhasil!');
    }
}
