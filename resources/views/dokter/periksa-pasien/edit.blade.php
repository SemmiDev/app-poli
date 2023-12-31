<x-app-layout>
    <div class="py-12 mt-2">
        <form method="POST" action="{{ route('dokter.periksa-pasien.update', ['poli' =>$poli->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="no_rm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Rekam
                    Medis</label>
                <input type="text" id="no_rm" readonly disabled name="no_rm" value="{{ $pasien->no_rm }}" autofocus
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan No RM" required>
                <x-input-error :messages="$errors->get('no_rm')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Pasien</label>
                <input type="text" id="nama" readonly disabled name="nama" value="{{ $pasien->nama }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan nama lengkap" required>
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="tgl_periksa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Periksa</label>
                <input
                autofocus
                type="datetime-local" id="tgl_periksa" name="tgl_periksa" value="{{ $poli->keluhan }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                <x-input-error :messages="$errors->get('tgl_periksa')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="catatan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                <input type="text" id="catatan" name="catatan" placeholder="Masukkan catatan"
                value="-"
                required
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <x-input-error :messages="$errors->get('catatan')" class="mt-2" />
            </div>

            <div class="flex items-center mb-5">
                <div class="flex flex-col gap-2">
                    @foreach ($daftarObat as $obat)
                        <div class="flex items-center gap-1">
                            <input id="default-checkbox" type="checkbox" value="{{ $obat->id }}" name="obat[]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 font-medium text-gray-900 dark:text-gray-300">
                                {{ $obat->nama_obat }} | {{ $obat->kemasan }}
                                <span class="font-semibold text-green-600"> {{ 'Rp ' . number_format($obat->harga, 0, ',', '.') }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <x-primary-button class="ms-3">
                Simpan
            </x-primary-button>

        </form>
    </div>
</x-app-layout>
