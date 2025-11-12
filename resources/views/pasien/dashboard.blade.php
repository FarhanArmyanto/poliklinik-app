<x-layouts.app title="Dashboard Pasien">
    <div class="container-fluid p-4">
        <div class="card shadow-sm border-0 rounded-xl">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-3 text-gray-800">
                    Halo, Selamat Datang Pasien 👋
                </h1>
                <p class="text-gray-600 mb-4">
                    Selamat datang di sistem informasi Poliklinik.  
                    Silakan pilih menu di sebelah kiri untuk melihat data poli, jadwal dokter, atau melakukan pendaftaran.
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
