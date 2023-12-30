<x-app-layout>
    <div class="py-12 mt-2">
        <form method="POST" action="{{ route('pasien.daftar-poli.store') }}">
            @csrf

            <div class="mb-5">
                <label for="no_rm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Rekam
                    Medis</label>
                <input type="text" id="no_rm" name="no_rm" value="{{ $pasien->no_rm }}" readonly disabled
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan no. rekam medis" required>
            </div>


            <div class="mb-5">
                <label for="id_poli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Poli</label>
                <select id="id_poli" name="id_poli"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                    <option value="">Pilih Poli</option>
                    @foreach ($daftarPoli as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="id_jadwal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Jadwal</label>
                <select id="id_jadwal" name="id_jadwal"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                    <option value="">Pilih Jadwal</option>
                </select>
            </div>



            <div class="mb-5">
                <label for="keluhan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan</label>
                <textarea id="keluhan" name="keluhan" rows="5"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan keluhan" required></textarea>
            </div>

            <x-primary-button class="ms-3">
                Daftar
            </x-primary-button>

        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let id_poliSelect = document.getElementById('id_poli');
            let id_jadwalSelect = document.getElementById('id_jadwal');

            function updateJadwalOptions(data) {
                // Clear existing options
                id_jadwalSelect.innerHTML = '<option value="">Pilih Jadwal</option>';

                data.data.forEach(function(value) {
                    let option = document.createElement('option');
                    option.value = value.id;
                    option.text = `${value.hari} : ${value.jam_mulai} - ${value.jam_selesai} - ${'dr. ' + value.nama}`;
                    id_jadwalSelect.add(option);
                });
            }

            function fetchJadwalOptions(id_poli) {
                fetch("{{ route('dokter.jadwal-periksa.get-jadwal') }}?id_poli=" + id_poli)
                    .then(response => response.json())
                    .then(data => updateJadwalOptions(data))
                    .catch(error => console.error('Error:', error));
            }

            // Initial fetch on page load
            fetchJadwalOptions(id_poliSelect.value);

            // Update schedules when the selected polyclinic changes
            id_poliSelect.addEventListener('change', function() {
                fetchJadwalOptions(this.value);
            });
        });
    </script>
</x-app-layout>
