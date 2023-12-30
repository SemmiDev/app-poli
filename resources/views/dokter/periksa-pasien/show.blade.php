<x-app-layout>
    <div class="py-12 mt-2">
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
            <input type="datetime-local" id="tgl_periksa" name="tgl_periksa" value="{{ $periksa->tgl_periksa }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
            <x-input-error :messages="$errors->get('tgl_periksa')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
            <input type="text"
            value="{{ $periksa->catatan }}"
            id="catatan" name="catatan" placeholder="Masukkan catatan" value="-" required
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            <x-input-error :messages="$errors->get('catatan')" class="mt-2" />
        </div>

        <div class="flex items-center mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead>
                    <tr>
                        <th class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">Nama Obat</th>
                        <th class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">Kemasan</th>
                        <th class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarObat as $obat)
                        <tr>
                            <td class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $obat->obat->nama_obat }}</td>
                            <td class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $obat->obat->kemasan }}</td>
                            <td class="px-2 py-1 text-sm font-medium text-gray-900 dark:text-white">
                                {{ 'Rp ' . number_format($obat->obat->harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-5">
            <label for="total_harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                Harga</label>
                <span class="bg-teal-100 text-teal-800 font-medium text-xl me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">
                    {{ 'Rp ' . number_format($periksa->biaya_periksa, 0, ',', '.') }}
                </span>
            <x-input-error :messages="$errors->get('total_harga')" class="mt-2" />
        </div>
    </div>
</x-app-layout>
