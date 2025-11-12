<x-layouts.app title="Poli">
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-lg-12">
                {{-- Alert flash message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1 class="mb-4">Poli</h1>

                <div class="row">
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <h5 class="card-header bg-gray">Daftar Poli</h5>
                            <div class="card-body">
                                <form action="{{ route('pasien.daftar.submit') }}" method="POST" id="formDaftarPoli">
                                    @csrf
                                    <input type="hidden" name="id_pasien" value="{{ $user->id }}">

                                    <div class="mb-3">
                                        <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                                        <input type="text" class="form-control" id="no_rm" value="{{ $user->no_rm }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="selectPoli" class="form-label">Pilih Poli</label>
                                        <select name="id_poli" id="selectPoli" class="form-control" required>
                                            <option value="">-- Pilih Poli --</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="selectJadwal" class="form-label">Pilih Jadwal Periksa</label>
                                        <select name="id_jadwal" id="selectJadwal" class="form-control" required disabled>
                                            <option value="">-- Pilih Jadwal --</option>
                                            @foreach ($jadwals as $jadwal)
                                                <option value="{{ $jadwal->id }}" data-id-poli="{{ $jadwal->dokter->poli->id ?? '' }}">
                                                    {{ $jadwal->dokter->poli->nama_poli ?? '-' }} |
                                                    {{ ucfirst($jadwal->hari) }},
                                                    {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} |
                                                    {{ $jadwal->dokter->nama ?? '--' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keluhan" class="form-label">Keluhan</label>
                                        <textarea name="keluhan" id="keluhan" rows="3" class="form-control" placeholder="Tuliskan keluhan Anda di sini..." required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>

{{-- Script JS --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectPoli = document.getElementById('selectPoli');
        const selectJadwal = document.getElementById('selectJadwal');
        const form = document.getElementById('formDaftarPoli');

        // Filter jadwal sesuai poli yang dipilih
        selectPoli.addEventListener('change', function() {
            const poliId = this.value;
            const hasPoli = poliId !== '';

            // Aktifkan atau nonaktifkan dropdown jadwal
            selectJadwal.disabled = !hasPoli;

            Array.from(selectJadwal.options).forEach(option => {
                if (option.value === "") return;
                option.hidden = !hasPoli || option.dataset.idPoli !== poliId;
            });

            selectJadwal.value = "";
        });

        // Pastikan dropdown jadwal diaktifkan sebelum submit (agar value terkirim)
        form.addEventListener('submit', function() {
            selectJadwal.disabled = false;
        });
    });
</script>
