@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="mb-4">Dashboard Dokter</h1>

    <div class="card">
        <div class="card-body">
            <p>Selamat datang, <strong>{{ Auth::user()->nama ?? Auth::user()->name }}</strong></p>

            <a href="{{ route('dokter.jadwal-periksa.index') }}"
               class="btn btn-primary mt-3">
                <i class="fas fa-calendar-check"></i> Lihat Jadwal Periksa
            </a>
        </div>
    </div>

</div>
@endsection
