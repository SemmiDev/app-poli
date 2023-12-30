<x-app-layout>
    <div class="py-12 mt-2">

        <form method="POST" action="{{ route('admin.dokter.store') }}">
            @csrf
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan nama lengkap" required>
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                <input type="text" id="no_hp" name="no_hp"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan No HP" required>
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="alamat"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan alamat" required>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="id_poli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poli</label>
                <select id="id_poli" name="id_poli"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                    @foreach ($daftarPoli as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_poli')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center">
                <x-primary-button class="ms-3">
                    Tambah Dokter
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
