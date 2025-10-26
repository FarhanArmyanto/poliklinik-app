<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = User::where('role', 'pasien')->with('poli')->get();
        return view('admin.pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $polis = Poli::all();
        return view('admin.pasien.create', compact('polis'));
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
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
        ]);

        return redirect()->route('pasien.index')
            ->with('message', 'pasien berhasil ditambahkan.')
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
    public function edit(User $pasien)
    {
        $polis = Poli::all();
        return view('admin.pasien.edit', compact('pasien', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, User $pasien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16',
            // 'no_ktp' => 'required|string|max:16|unique:users,no_ktp' . $pasien->id,
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|unique:users,email,' . $pasien->id,
            // 'email' => 'required|string|unique:users,email' . $pasien->id,
            'password' => 'nullable|min:6',
        ]);

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_ktp = $request->no_ktp;
        $pasien->no_hp = $request->no_hp;
        $pasien->email = $request->email;

        //update password bila password disii
        if ($request->filled('password')) {
            $pasien->password = Hash::make($request->password);
        }

        //disimpan
        $pasien->update();

        return redirect()->route('pasien.index')->with('success', 'Data pasien Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien Berhasil dihapus');
    }
}