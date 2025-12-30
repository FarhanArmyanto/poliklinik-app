<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        // versi aman dulu (statis)
        return view('dokter.jadwal-periksa.index');
    }
}
