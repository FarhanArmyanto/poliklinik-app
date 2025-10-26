<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = User::where('role', 'dokter')->with('poli')->get();
        return view('admin.dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
        ]);

        return redirect()->route('dokter.index')
            ->with('message', 'dokter berhasil ditambahkan.')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, User $dokter)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp',
            // 'no_ktp' => 'required|string|max:16|unique:users,no_ktp' . $pasien->id,
            'no_hp' => 'required|string|max:15',
            'id_poli' => 'required|string|exists:poli,id', // intinya id nya ada di poli
            'email' => 'required|string|unique:users,email,' . $dokter->id,
            // 'email' => 'required|string|unique:users,email' . $dokter->id,
            'password' => 'nullable|min:6',
        ]);

        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_ktp = $request->no_ktp;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->id_poli;
        $dokter->email = $request->email;

        //update password bila password disii
        if ($request->filled('password')) {
            $dokter->password = Hash::make($request->password);
        }

        //disimpan
        $dokter->save();

        return redirect()->route('dokter.index')->with('success', 'Data dokter Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter Berhasil dihapus');
    }
}